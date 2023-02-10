<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Podcast\CommentService;
use App\Services\Podcast\EpisodeService;
use App\Services\Podcast\PodcastService;
use App\Services\Podcast\Interfaces\CommentServiceInterface;
use App\Services\Podcast\Interfaces\EpisodeServiceInterface;
use App\Services\Podcast\Interfaces\PodcastServiceInterface;

class BindServiceProvider extends ServiceProvider
{
    public $bindings = [
        PodcastServiceInterface::class => PodcastService::class,
        CommentServiceInterface::class => CommentService::class,
        EpisodeServiceInterface::class => EpisodeService::class,
    ];
}
