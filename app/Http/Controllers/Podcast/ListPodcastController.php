<?php

namespace App\Http\Controllers\Podcast;

use App\Http\Controllers\Controller;
use App\Http\Requests\Podcast\ListPodcastRequest;
use App\Services\Podcast\Interfaces\PodcastServiceInterface;

class ListPodcastController extends Controller
{
    public function __invoke(ListPodcastRequest $request, PodcastServiceInterface $service)
    {
        $categoryId = $request->input('category_id');
        $search = $request->input('search');

        return response()->json($service->list(compact('categoryId', 'search')));
    }
}
