<?php

namespace App\Http\Controllers\Podcast;

use App\Http\Controllers\Controller;
use App\Http\Requests\Podcast\CreatePodcastRequest;
use App\Services\Podcast\Interfaces\PodcastServiceInterface;

class CreatePodcastController extends Controller
{
    public function __invoke(CreatePodcastRequest $request, PodcastServiceInterface $service)
    {
        $data = $request->all();
        return response()->json($service->create($data));
    }
}
