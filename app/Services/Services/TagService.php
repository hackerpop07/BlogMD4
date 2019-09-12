<?php


namespace App\Services\Services;


use App\Repositories\Contracts\TagRepositoryInterface;
use App\Services\Contracts\TagServiceInterface;

class TagService extends Service implements TagServiceInterface
{
    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->setRepository($tagRepository);
    }

    public function firstOrCreate($request)
    {
        return $this->repository->firstOrCreate($request);
    }
}
