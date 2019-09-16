<?php


namespace App\Services\Services;


use App\Repositories\Contracts\ShareLinkPostRepositoryInterface;
use App\Services\Contracts\ShareLinkPostServiceInterface;

class ShareLinkPostService extends Service implements ShareLinkPostServiceInterface
{
    public function __construct(ShareLinkPostRepositoryInterface $shareLinkPostRepository)
    {
        $this->setRepository($shareLinkPostRepository);
    }


    public function searchUserGet($column, $keyword)
    {
        return $this->repository->searchUserGet($column, $keyword);
    }
}
