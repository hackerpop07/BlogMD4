<?php


namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\ShareLinkPostRepositoryInterface;
use App\ShareLinkPost;

class ShareLinkPostRepositoryEloquent extends RepositoryEloquent implements ShareLinkPostRepositoryInterface
{
    public function getModel()
    {
        return ShareLinkPost::class;
    }

    public function searchUserGet($column, $keyword)
    {
        return $this->model::where($column, $keyword)->get();
    }
}
