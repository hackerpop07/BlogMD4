<?php


namespace App\Services\Services;


use App\Repositories\Contracts\PostRepositoryInterface;
use App\Services\Contracts\PostServiceInterface;
use Illuminate\Support\Facades\Auth;

class PostService extends Service implements PostServiceInterface
{
    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->setRepository($postRepository);
    }

    public function getAllOfUserLogin()
    {
        return $this->repository->getAllOfUserLogin();
    }

    public function getPostOfNumber($number)
    {
        return $this->repository->getPostOfNumber($number);
    }

    public function create($request)
    {
        if ($request->hasFile('image')) {
            $file = $request->image;
            $file->store('/image', 'public');
            $array = $request->all();
            $array['image'] = $file->hashName();
            $array['user_id'] = Auth::user()->id;
            $this->repository->create($array);
        }
    }

    public function getPostTopView()
    {
        return $this->repository->getPostTopView();
    }

}
