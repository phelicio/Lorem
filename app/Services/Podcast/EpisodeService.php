<?php

namespace App\Services\Podcast;

use App\Models\Podcast\Episode;
use App\Services\Podcast\Traits\CommonOperations;
use App\Services\Podcast\Interfaces\EpisodeServiceInterface;

class EpisodeService implements EpisodeServiceInterface
{
    use CommonOperations;

    public function __construct(
        protected Episode $model
    ) {
    }
}
