<?php

namespace App\Http\Controllers;

use App\Http\Controllers\InterfaceConstant\ImagesAlbumConstant;
use App\Http\Controllers\InterfaceConstant\PostConstant;
use App\Mail\SharePostOfGmail;
use App\Services\Contracts\ImageAlbumServiceInterFace;
use App\Services\Contracts\ShareLinkPostServiceInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ImageAlbumController extends Controller
{
    private $imageAlbumServiceInterFace;
    private $userService;
    private $shareLinkPostService;

    public function __construct(ImageAlbumServiceInterFace $imageAlbumServiceInterFace,
                                UserServiceInterface $userService,
                                ShareLinkPostServiceInterface $shareLinkPostService)
    {
        $this->imageAlbumServiceInterFace = $imageAlbumServiceInterFace;
        $this->userService = $userService;
        $this->shareLinkPostService = $shareLinkPostService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = $this->imageAlbumServiceInterFace->getAllOfUserLogin();
        return view('admin.images.list', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->imageAlbumServiceInterFace->create($request);
        return redirect()->route('images.index')->with('success', 'Đã Lưu Thành Công');;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $images = $this->imageAlbumServiceInterFace->detailImagesOfUserLogin();
        $user = Auth::user();
        return view('admin.images.detail', compact('images', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = $this->imageAlbumServiceInterFace->getById($id);
        return view('admin.images.edit', compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->imageAlbumServiceInterFace->update($request, $id);
        return redirect()->route('images.index')->with('success', 'Đã Lưu Thành Công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->imageAlbumServiceInterFace->delete($id);
        return redirect()->route('images.index')->with('success', 'Đã Xóa Thành Công');
    }

    public function shareLink(Request $request)
    {
        $user = $this->userService->searchEmail('email', $request->email);
        if ($user) {
            $data = $request->all();
            $data['user_send'] = Auth::user()->id;
            $data['user_get'] = $user->id;
            $data['link_post'] = ImagesAlbumConstant::LINK_IMAGES . Auth::user()->id;
            $this->shareLinkPostService->create($data);
            return redirect()->back()->with('success', 'Thành Công');
        }
        return redirect()->back()->with('error', 'Email không tồn tại trong hệ thống');
    }

    public function getShareLink()
    {
        return view('admin.images.share');
    }

    public function viewSendGmail()
    {
        return view('admin.images.send');
    }

    public function sendGmail(Request $request)
    {
        $linkPost = ImagesAlbumConstant::LINK_IMAGES . Auth::user()->id;
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
