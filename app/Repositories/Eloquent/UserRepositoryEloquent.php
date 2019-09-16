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

    public function searchEmail($column, $keyword)
    {
        return $this->model::where($column, $keyword)->first();
    }
}
