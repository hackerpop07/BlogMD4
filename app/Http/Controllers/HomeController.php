<?php

namespace App\Http\Controllers;

use App\Services\Contracts\PostServiceInterface;
use App\Services\Contracts\ShareLinkPostServiceInterface;
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


    public function __construct(PostServiceInterface $postService,
                                ShareLinkPostServiceInterface $shareLinkPostService)
    {
        $this->postService = $postService;
        $this->shareLinkPostService = $shareLinkPostService;

//        $this->middleware('auth');
    }

    public function index()
    {
        define('pucblic', 1);
        define('postNumber', 3);
        $column = 'status';
        $keyword = pucblic;
        $postsSlide = $this->postService->getPostOfNumber(postNumber);
        $total = count($this->postService->getAll());
        $posts = $this->postService->search($column, $keyword);
        $topPosts = $this->postService->getPostTopView();
        return view('index', compact('posts', 'postsSlide', 'total', "topPosts"));
    }


    public function search(Request $request)
    {
        define('pucblic', 1);
        define('postNumber', 3);
        $columnStatus = 'status';
        $columnTitle = 'title';
        $postsSlide = $this->postService->getPostOfNumber(postNumber);
        $total = count($this->postService->getAll());
        $posts = $this->postService->searchTowColumn($columnStatus, pucblic, $columnTitle, $request->keywords);
        $topPosts = $this->postService->getPostTopView();
        return view('index', compact('posts', 'total', 'keyword', 'topPosts', 'postsSlide'));
    }

    public function show($id)
    {
        define('pucblic', 1);
        $postKey = 'post_' . $id;
        $post = $this->postService->getById($id);
        if (!Auth::user()) {
            if ($post->status == pucblic) {
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
            if ($post->status == pucblic && $post->user->id == Auth::user() ? 'sai' : Auth::user()->id) {
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

}
