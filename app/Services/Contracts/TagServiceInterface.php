<?php


namespace App\Services\Contracts;


interface TagServiceInterface
{
    public function firstOrCreate($request);

    public function searchFirstOrFail($column, $keyword);

}
