<?php


namespace App\Repositories\Eloquent;


use App\ImageAlbum;
use App\Repositories\Contracts\ImageAlbumRepositoryInterface;

class ImageAlbumRepositoryEloquent extends RepositoryEloquent implements ImageAlbumRepositoryInterface
{

    public function getModel()
    {
        return ImageAlbum::class;
    }

    public function detailImagesOfUserLogin()
    {
        return $this->model::where('user_id', $this->getUserLogin()->id)->get();
    }
}
