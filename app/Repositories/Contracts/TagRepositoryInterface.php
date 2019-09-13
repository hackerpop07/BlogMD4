<?php


namespace App\Repositories\Contracts;


interface TagRepositoryInterface
{
    public function firstOrCreate($request);

    public function searchFirstOrFail($column, $keyword);
}
