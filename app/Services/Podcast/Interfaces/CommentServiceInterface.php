<?php

namespace App\Services\Podcast\Interfaces;

interface CommentServiceInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function list(int $id);
    public function delete(int $id);
}