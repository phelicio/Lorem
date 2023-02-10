<?php

namespace App\Services\Podcast;

use App\Models\Podcast\Podcast;
use App\Services\Podcast\Traits\CommonOperations;
use App\Services\Podcast\Interfaces\PodcastServiceInterface;

class PodcastService implements PodcastServiceInterface
{
    use CommonOperations;

    public function __construct(
        protected Podcast $model
    ) {
    }

    public function list(array $data)
    {
        return $this->model->when($data['categoryId'], function ($query, $categoryId) {
            return $query->where('category_id', $categoryId);
        })->when($data['search'], function ($query, $search) {
            return $query->where('name', 'LIKE', "%{$search}%");
        })->paginate();
    }
}
