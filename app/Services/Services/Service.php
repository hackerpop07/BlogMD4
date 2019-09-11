<?php


namespace App\Services\Services;


use App\Services\Contracts\ServiceInterface;
use Illuminate\Filesystem\Filesystem;
use Monolog\Handler\IFTTTHandler;

class Service implements ServiceInterface
{
    protected $repository;

    public function setRepository($repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function getById($id)
    {
        return $this->repository->getById($id);
    }

    public function create($request)
    {
        if (isset($request->image)) {
            if ($request->hasFile('image')) {
                $file = $request->image;
                $file->store('/image', 'public');
                $array = $request->all();
                $array['image'] = $file->hashName();
                $this->repository->create($array);
            }
        }
        $this->repository->create($request);
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
                return $this->repository->update($array, $result);
            }
            return $this->repository->update($request->all(), $result);
        }
    }

    public function delete($id)
    {
        $result = $this->repository->getById($id);
        return $this->repository->delete($result);
    }

    public function search($column, $keyword)
    {
        return $this->repository->search($column, $keyword);
    }

    public function deleteFile($url)
    {
        $file = new Filesystem();
        $file->delete($url);
    }
}
