<?php

namespace App\Http\Controllers\Podcast\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\GetPodcastCommentsRequest;
use App\Services\Interfaces\CommentServiceInterface;

class GetPodcastCommentsController extends Controller
{
    public function __invoke(GetPodcastCommentsRequest $request, CommentServiceInterface $service)
    {
        $id = $request->input('podcast_id');
        return response()->json($service->list($id));
    }
}
