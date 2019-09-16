<?php


namespace App\Services\Contracts;


interface ShareLinkPostServiceInterface extends ServiceInterface
{
    public function searchUserGet($column, $keyword);
}
