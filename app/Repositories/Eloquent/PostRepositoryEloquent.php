<?php


namespace App\Repositories\Eloquent;


use App\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class PostRepositoryEloquent extends RepositoryEloquent implements PostRepositoryInterface
{

    public function getModel()
    {
        return Post::class;
    }

    public function getPostOfNumber($number)
    {
        define('publics', 1);
        return $this->model->where('status', publics)->paginate($number);
    }

    public function getPostTopView()
    {
        return $this->model->orderBy('view', 'desc')->paginate(6);
    }

    public function getPost($id)
    {
        return $this->model::find($id);
    }

    public function searchTowColumn($column1, $keyword1, $column2, $keyword2)
    {
        return $post = $this->model::where($column1, $keyword1)->where($column2, 'LIKE', '%' . $keyword2 . "%")->paginate(6);
    }
}
