<?php

namespace App\Services\Podcast\Interfaces;

interface EpisodeServiceInterface
{
    public function create(array $data);
    public function update(int $id, array $data);
    public function list(int $podcast_id);
    public function delete(int $id);
}