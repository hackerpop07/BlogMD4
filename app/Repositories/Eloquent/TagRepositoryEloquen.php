<?php


namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\TagRepositoryInterface;
use App\Tag;

class TagRepositoryEloquen extends RepositoryEloquent implements TagRepositoryInterface
{

    public function getModel()
    {
        return Tag::class;
    }

    public function firstOrCreate($request)
    {
        return $this->model::firstOrCreate($request);
    }
}
