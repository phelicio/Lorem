<?php

namespace App\Providers;

use App\Services\Auth\AuthService;
use Illuminate\Support\ServiceProvider;
use App\Services\Podcast\CommentService;
use App\Services\Podcast\EpisodeService;
use App\Services\Podcast\PodcastService;
use App\Services\Auth\Interfaces\AuthServiceInterface;
use App\Services\Podcast\Interfaces\CommentServiceInterface;
use App\Services\Podcast\Interfaces\EpisodeServiceInterface;
use App\Services\Podcast\Interfaces\PodcastServiceInterface;

class BindServiceProvider extends ServiceProvider
{
    public $bindings = [
        //AUTH
        AuthServiceInterface::class => AuthService::class,
        //PODCAST
        EpisodeServiceInterface::class => EpisodeService::class,
        PodcastServiceInterface::class => PodcastService::class,
        CommentServiceInterface::class => CommentService::class,
    ];
}
