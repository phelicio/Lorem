<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PoscastTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function list_podcast()
    {
        $response = $this->get('api/podcasts');
        $response->assertOk();
    }
}
