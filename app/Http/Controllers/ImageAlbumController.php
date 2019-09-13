<?php

namespace App\Http\Controllers;

use App\Services\Contracts\ImageAlbumServiceInterFace;
use Illuminate\Http\Request;

class ImageAlbumController extends Controller
{
    private $imageAlbumServiceInterFace;

    public function __construct(ImageAlbumServiceInterFace $imageAlbumServiceInterFace)
    {
        $this->imageAlbumServiceInterFace = $imageAlbumServiceInterFace;
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
        return view('admin.images.detail', compact('images'));
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
}
