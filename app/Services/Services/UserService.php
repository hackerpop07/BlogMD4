<?php


namespace App\Services\Services;


use App\Repositories\Contracts\UserRepositoryInterface;
use App\Services\Contracts\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserService extends Service implements UserServiceInterface
{
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->setRepository($userRepository);
    }

    public function searchEmail($column, $keyword)
    {
        return $this->repository->searchEmail($column, $keyword);
    }

}
