<?php

namespace App\Services\Auth\Interfaces;

use App\Models\Auth\User;

interface AuthServiceInterface
{
    public function login(array $data): User;
    public function register(array $data): User;
}
