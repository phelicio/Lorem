<?php

namespace Tests\Feature;

use App\Models\Auth\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /**
     * @test
     */
    public function login_successfully_with_valid_user()
    {
        $data = [
            'email' => $this->user->email,
            'password' => 'password',
        ];

        $response = $this->post('api/auth/login', $data);
        $response->assertOk()->assertJsonStructure([
            'message',
            'user' => [
                'name',
                'email',
                'created_at',
                'updated_at',
                'token',
            ]
        ]);
    }

    /**
     * @test
     */
    public function return_unauthorized_if_login_fail()
    {
        $wrongPassword = str_shuffle($this->user->password);

        $response = $this->post('api/auth/login', [
            'email' => $this->user->email,
            'password' => $wrongPassword,
        ]);

        $response->assertUnauthorized();
    }
}
