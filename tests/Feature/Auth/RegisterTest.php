<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @dataProvider provideRegisterData
     */
    public function register_will_fail_with_invalid_data(array $registerData, array $expectedErrors)
    {
        $response = $this->post('api/auth/register', $registerData);
        $response->assertUnprocessable();
        $response->assertInvalid($expectedErrors);
    }

    private function provideRegisterData()
    {
        return [
            'with invalid email' => [
                'registerData' => [
                    'name' => 'test',
                    'email' => 'test',
                    'password' => '11111111',
                ],
                'expectedErrors' => [
                    "email" => [
                        "The email must be a valid email address.",
                    ],
                ],
            ],
            'with invalid name' => [
                'registerData' => [
                    'name' => 'te',
                    'email' => 'test@test.test',
                    'password' => '11111111',
                ],
                'expectedErrors' => [
                    "name" => [
                        "The name must be at least 3 characters.",
                    ],
                ],
            ],
            'with invalid password' => [
                'registerData' => [
                    'name' => 'test',
                    'email' => 'test@test.test',
                    'password' => '11111',
                ],
                'expectedErrors' => [
                    "password" => [
                        "The password must be at least 8 characters.",
                    ],
                ],
            ],
            'with all data invalid' => [
                'registerData' => [
                    'name' => 'te',
                    'email' => 'test',
                    'password' => '11111',
                ],
                'expectedErrors' => [
                    "name" => [
                        "The name must be at least 3 characters.",
                    ],
                    "email" => [
                        "The email must be a valid email address.",
                    ],
                    "password" => [
                        "The password must be at least 8 characters.",
                    ],
                ],
            ],
        ];
    }

    /**
     * @test
     */
    public function register_will_not_fail_with_valid_data()
    {
        $data = [
            'name' => 'test',
            'email' => 'test@test.test',
            'password' => '11111111',
        ];

        $response = $this->post('api/auth/register', $data);

        unset($data['password']);

        $response->assertCreated();
        $this->assertDatabaseHas('users', $data);
    }
}
