<?php

namespace App\Services\Podcast\Interfaces;

interface PodcastServiceInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function list(array $data);
    public function delete(int $id);
}