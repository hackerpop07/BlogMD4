<?php


namespace App\Repositories\Contracts;


interface PostRepositoryInterface extends RepositoryInterface
{
    public function getAllOfUserLogin();

    public function getPostOfNumber($number);

    public function getPostTopView();

    public function searchTowColumn($column1, $keyword1, $column2, $keyword2);
}
