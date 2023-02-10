<?php

namespace App\Services\Podcast\Traits;

trait CommonOperations 
{
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->model->where($id)->update($data);
    }

    public function delete(int $id)
    {
        return $this->model->delete($id);
    }

    public function list()
    {
        return $this->model->paginate();
    }
}