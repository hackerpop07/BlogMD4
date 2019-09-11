<?php


namespace App\Services\Contracts;


interface PostServiceInterface extends ServiceInterface
{
    public function getPostOfNumber($number);

    public function getPostTopView();

    public function searchTowColumn($column1, $keyword1, $column2, $keyword2);

    public function getPost($id);
}
