<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStore;
use App\Http\Requests\PostUpdate;
use App\Services\Contracts\PostServiceInterface;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getAllOfUserLogin();
        return view('admin.posts.list', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostStore $request)
    {
        $this->postService->create($request);
        return redirect()->route('post.index')->with('success', 'Đã Lưu Thành Công');
    }

    public function show($id)
    {
        $post = $this->postService->getById($id);
        return view('admin.posts.detail', compact('post'));
    }

    public function edit($id)
    {
        $post = $this->postService->getById($id);
        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostUpdate $request, $id)
    {
        $this->postService->update($request, $id);
        return redirect()->route('post.index')->with('success', 'Đã Lưu Thành Công');
    }

    public function destroy($id)
    {
        $this->postService->delete($id);
        return redirect()->route('post.index')->with('success', 'Đã Xóa Thành Công');
    }

    public function search(Request $request)
    {
        $column = 'title';
        $keyword = $request->keyword;
        $posts = $this->postService->search($column, $keyword);
        return view('admin.posts.list', compact('posts'));
    }

}
