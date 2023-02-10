<?php

namespace App\Http\Controllers\Podcast\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CreateCommentRequest;
use App\Services\Interfaces\CommentServiceInterface;

class CreateCommentController extends Controller
{
    public function __invoke(CreateCommentRequest $request, CommentServiceInterface $service)
    {
        $data = $request->all();
        return response()->json($service->create($data));
    }
}
