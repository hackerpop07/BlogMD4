<?php


namespace App\Repositories\Contracts;


interface RepositoryInterface
{
    public function getAll();

    public function delete($object);

    public function create($data);

    public function update($data, $object);

    public function getById($id);

    public function search($keyword, $column);

    public function getAllOfUserLogin();


}
