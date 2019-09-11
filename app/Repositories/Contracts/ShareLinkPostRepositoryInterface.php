<?php


namespace App\Repositories\Contracts;


interface ShareLinkPostRepositoryInterface extends RepositoryInterface
{
    public function searchUserGet($column, $keyword);
}
