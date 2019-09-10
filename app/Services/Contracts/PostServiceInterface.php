<?php


namespace App\Services\Contracts;


interface PostServiceInterface extends ServiceInterface
{
    public function getPostOfNumber($number);
    public function getPostTopView();
}
