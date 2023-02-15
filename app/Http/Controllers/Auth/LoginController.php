<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\Interfaces\AuthServiceInterface;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, AuthServiceInterface $service)
    {
        $data = $request->all();
        $user = $service->login($data);
        return response()->json([
            'message' => __('auth.failed'),
            'user' => $user,
        ]);
    }
}
