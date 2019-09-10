<?php


namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\UserRepositoryInterface;
use App\User;

class UserRepositoryEloquent extends RepositoryEloquent implements UserRepositoryInterface
{

    public function getModel()
    {
        return User::class;
    }
}
