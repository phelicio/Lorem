<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Auth\Interfaces\AuthServiceInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request, AuthServiceInterface $service)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = $service->register($data);

        return response()->json([
            'message' => __('auth.registered'),
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], Response::HTTP_CREATED);
    }
}
