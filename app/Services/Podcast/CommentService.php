<?php

namespace App\Services\Podcast;

use App\Models\Podcast\Comment;
use App\Services\Podcast\Traits\CommonOperations;
use App\Services\Podcast\Interfaces\CommentServiceInterface;

class CommentService implements CommentServiceInterface
{
    use CommonOperations;

    public function __construct(
        protected Comment $model
    ) {
    }

    public function list(int $id)
    {
        return $this->model->where('podcast_id', $id)->paginate();
    }
}
