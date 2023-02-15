<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
    }

    public function provideRegisterData()
    {
        return [
            'with invalid email' => [
                'registerData' => [


                ],
                'expectedErrors' => [

                ],
            ],
        ];
    }
}
