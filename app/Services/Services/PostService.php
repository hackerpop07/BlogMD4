<?php


namespace App\Services\Services;


use App\Repositories\Contracts\PostRepositoryInterface;
use App\Services\Contracts\PostServiceInterface;

use App\Services\Contracts\TagServiceInterface;
use Illuminate\Support\Facades\Auth;

class PostService extends Service implements PostServiceInterface
{
    protected $tagService;

    public function __construct(PostRepositoryInterface $postRepository,
                                TagServiceInterface $tagService)
    {
        $this->setRepository($postRepository);
        $this->tagService = $tagService;
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
            $post = $this->repository->create($array);
            if ($post) {
                $arrayTag = explode(',', $request->input('tag'));
                $tagIds = [];
                foreach ($arrayTag as $tagName) {
                    $tag = $this->tagService->firstOrCreate(['name' => $tagName]);
                    if ($tag) {
                        $tagIds[] = $tag->id;
                    }
                }
                $post->tags()->sync($tagIds);
            }
        }
    }

    public function update($request, $id)
    {
        $result = $this->repository->getById($id);
        if ($result) {
            if ($request->hasFile('image')) {
                if ($result->image !== '1.png') {
                    //chua xoa dc
                    $this->deleteFile('image/' . $result->image);
                }
                $file = $request->image;
                $file->store('/image', 'public');
                $array = $request->all();
                $array['image'] = $file->hashName();
                $post = $this->repository->update($array, $result);
                if ($post) {
                    $arrayTag = explode(',', $request->input('tag'));
                    $tagIds = [];
                    foreach ($arrayTag as $tagName) {
                        $tag = $this->tagService->firstOrCreate(['name' => $tagName]);
                        if ($tag) {
                            $tagIds[] = $tag->id;
                        }
                    }
                    $result->tags()->sync($tagIds);
                }
            } else {
                $post = $this->repository->update($request->all(), $result);
                if ($post) {
                    $arrayTag = explode(',', $request->input('tag'));
                    $tagIds = [];
                    foreach ($arrayTag as $tagName) {
                        $tag = $this->tagService->firstOrCreate(['name' => $tagName]);
                        if ($tag) {
                            $tagIds[] = $tag->id;
                        }
                    }
                    $result->tags()->sync($tagIds);
                }
            }
        }
    }

    public function getPostTopView()
    {
        return $this->repository->getPostTopView();
    }


    public function getPost($id)
    {
        return $this->repository->getPost($id);
    }

    public function searchTowColumn($column1, $keyword1, $column2, $keyword2)
    {
        return $this->repository->searchTowColumn($column1, $keyword1, $column2, $keyword2);
    }
}
