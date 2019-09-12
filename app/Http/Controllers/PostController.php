<?php

namespace App\Http\Controllers;

use App\Http\Controllers\InterfaceConstant\PostConstant;
use App\Http\Requests\PostStore;
use App\Http\Requests\PostUpdate;
use App\Mail\SharePostOfGmail;
use App\Services\Contracts\PostServiceInterface;
use App\Services\Contracts\ShareLinkPostServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PostController extends Controller
{
    protected $postService;
    protected $userService;
    protected $shareLinkPostService;

    public function __construct(PostServiceInterface $postService,
                                UserServiceInterface $userService,
                                ShareLinkPostServiceInterface $shareLinkPostService)
    {
        $this->postService = $postService;
        $this->userService = $userService;
        $this->shareLinkPostService = $shareLinkPostService;
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

    public function shareLink(Request $request)
    {
        $user = $this->userService->searchEmail('email', $request->email);
        if ($user) {
            $data = $request->all();
            $data['user_send'] = Auth::user()->id;
            $data['user_get'] = $user->id;
            $data['link_post'] = PostConstant::LINK_POST . $request->post_id;
            $this->shareLinkPostService->create($data);
            return redirect()->back()->with('success', 'Thành Công');
        }
        return redirect()->back()->with('error', 'Email không tồn tại trong hệ thống');
    }

    public function getShareLink($id)
    {
        return view('admin.posts.share', compact('id'));
    }

    public function inbox()
    {
        $shareLinkPosts = $this->shareLinkPostService->search('user_get', Auth::user()->id);
        $arrayInboxs = [];
        foreach ($shareLinkPosts as $key => $shareLinkPost) {
            $posts = $this->postService->getPost($shareLinkPost->id);
            $users = $this->userService->getById($shareLinkPost->user_send);
            $shareLinkPostId = $shareLinkPost->id;
            $link_post = $shareLinkPost->link_post;
            $box = [$posts, $users, $shareLinkPostId, $link_post];
            array_push($arrayInboxs, $box);
        }
        return view('admin.inbox', compact('arrayInboxs'));
    }

    public function inboxDelete($id)
    {
        $this->shareLinkPostService->delete($id);
        return redirect()->back()->with('success', 'Xóa Thành Công');
    }

    public function viewSendGmail($id)
    {
        return view('admin.posts.send', compact('id'));
    }

    public function sendGmail(Request $request)
    {
        $linkPost = PostConstant::LINK_POST . $request->id;
        $receiver_user = $request->name_user;
        $user_send = Auth::user()->name;
        $data = array('linkPost' => $linkPost,
            "user_send" => $user_send,
            "receiver_user" => $receiver_user
        );
        Mail::to($request->email)->send(new SharePostOfGmail($data));
        if (Mail::failures()) {
            return redirect()->back()->with('error', "Lỗi không gửi được. Hãy thử lại sau");
        } else {
            return redirect()->back()->with('success', "Gửi email thành công");
        }
    }

}
