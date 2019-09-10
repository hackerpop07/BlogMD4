<?php

namespace App\Http\Controllers;

use App\Services\Contracts\PostServiceInterface;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
//        $this->middleware('auth');
    }

    public function index()
    {
        $column = 'status';
        $keyword = 1;
        $postsSlide = $this->postService->getPostOfNumber(3);
        $total = count($this->postService->getAll());
        $posts = $this->postService->search($column, $keyword);
        $topPosts = $this->postService->getPostTopView();
        return view('index', compact('posts', 'postsSlide', 'total', "topPosts"));
    }

    //chưa lọc được các bài ẩn....
    public function search(Request $request)
    {
        $column = 'title';
        $keyword = $request->keywords;
        $total = $this->postService->search($column, $keyword);
        $posts = $this->postService->search($column, $keyword);
        $topPosts = $this->postService->getPostTopView();
        return view('guest.page.search', compact('posts', 'total', 'keyword', 'topPosts'));
    }

    public function show($id)
    {
        $postKey = 'post_' . $id;
        $post = $this->postService->getById($id);
        if (!Session::has($postKey)) {
            $view = ['view' => ++$post->view];
            $post->update($view);
            Session::put($postKey, 1);
        }
        $topPosts = $this->postService->getPostTopView();
        return view('guest.page.detail', compact('post', 'topPosts'));
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
