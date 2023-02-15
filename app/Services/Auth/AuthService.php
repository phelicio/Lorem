<?php

namespace App\Services\Auth;

use App\Exceptions\Auth\InvalidLoginException;
use App\Models\Auth\User;
use App\Services\Auth\Interfaces\AuthServiceInterface;
use Illuminate\Support\Facades\Auth;

class AuthService implements AuthServiceInterface
{
    public function __construct(
        protected User $model
    ) {
    }

    public function login(array $data): User
    {
        if(! Auth::attempt($data)) {
           throw new InvalidLoginException();
        }

        $user = $this->model->where('email', $data['email'])->first();
        $user->token = $user->createToken("API TOKEN")->plainTextToken;
        return $user;
    }

    public function register(array $data): User
    {
        return $this->model->create($data);
    }
}
