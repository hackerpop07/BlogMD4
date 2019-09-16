<?php

namespace App\Http\Controllers;

use App\Http\Controllers\InterfaceConstant\PostConstant;
use App\Http\Controllers\InterfaceConstant\PostStatusConstant;
use App\Services\Contracts\PostServiceInterface;
use App\Services\Contracts\ShareLinkPostServiceInterface;
use App\Services\Contracts\TagServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use function Aws\filter;

class HomeController extends Controller
{
    protected $postService;
    protected $shareLinkPostService;
    protected $tagService;
    protected $userService;


    public function __construct(PostServiceInterface $postService,
                                ShareLinkPostServiceInterface $shareLinkPostService,
                                TagServiceInterface $tagService,
                                UserServiceInterface $userService
    )
    {
        $this->postService = $postService;
        $this->shareLinkPostService = $shareLinkPostService;
        $this->tagService = $tagService;
        $this->userService = $userService;

    }

    public function index()
    {
        $postsSlide = $this->postService->getPostOfNumber(PostConstant::NUMBER_POST);
        $total = count($this->postService->getAll());
        $posts = $this->postService->search('status', PostStatusConstant::PUBLIC);
        $topPosts = $this->postService->getPostTopView();
        return view('index', compact('posts', 'postsSlide', 'total', "topPosts"));
    }


    public function search(Request $request)
    {
        $postsSlide = $this->postService->getPostOfNumber(PostConstant::NUMBER_POST);
        $total = count($this->postService->getAll());
        $posts = $this->postService->searchTowColumn('status', PostStatusConstant::PUBLIC, 'title', $request->keywords);
        $topPosts = $this->postService->getPostTopView();
        return view('index', compact('posts', 'total', 'keyword', 'topPosts', 'postsSlide'));
    }

    public function show($id)
    {
        $postKey = 'post_' . $id;
        $post = $this->postService->getById($id);
        if (!Auth::user()) {
            if ($post->status == PostStatusConstant::PUBLIC) {
                if (!Session::has($postKey)) {
                    $view = ['view' => ++$post->view];
                    $post->update($view);
                    Session::put($postKey, 1);
                }
                $topPosts = $this->postService->getPostTopView();
                return view('guest.page.detail', compact('post', 'topPosts'));
            } else {
                return redirect()->route('page.index');
            }
        } else {
            if ($post->status == PostStatusConstant::PUBLIC || $post->user->id == Auth::user()->id) {
                if (!Session::has($postKey)) {
                    $view = ['view' => ++$post->view];
                    $post->update($view);
                    Session::put($postKey, 1);
                }
                $topPosts = $this->postService->getPostTopView();
                return view('guest.page.detail', compact('post', 'topPosts'));
            } else {
                $shareLinkPosts = $this->shareLinkPostService->search('user_get', Auth::user()->id);
                foreach ($shareLinkPosts as $key => $value) {
                    if ($id == $value->post_id) {
                        if (!Session::has($postKey)) {
                            $view = ['view' => ++$post->view];
                            $post->update($view);
                            Session::put($postKey, 1);
                        }
                        $topPosts = $this->postService->getPostTopView();
                        return view('guest.page.detail', compact('post', 'topPosts'));
                    }
                }
            }
            return redirect()->route('page.index');
        }
    }

    public function about()
    {
        $topPosts = $this->postService->getPostTopView();
        return view('guest.page.about', compact('topPosts'));
    }

    public function contact()
    {
        $topPosts = $this->postService->getPostTopView();
        return view('guest.page.contact', compact('topPosts'));
    }

    public function home()
    {
        return view('home');
    }

    public function pdf($id)
    {
        $post = $this->postService->getById($id);
        $pdf = PDF::loadView('postPDF', compact('post'));
        return $pdf->download('document.pdf');
    }

    public function tag($tag)
    {
        $tag = $this->tagService->searchFirstOrFail('name', $tag);
        $posts = $tag->posts;
        $topPosts = $this->postService->getPostTopView();
        return view('guest.page.tag', compact('posts', 'topPosts'));
    }

    public function imagesList()
    {
        $users = $this->userService->getAll();
        return view('guest.page.imagesList', compact('users'));
    }

    public function imagesDetail($id)
    {
        $user = $this->userService->getById($id);
        return view('guest.page.imagesDetail', compact('user'));
    }

}
