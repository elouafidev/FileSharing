<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeFrontTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_home_page(): void
    {
        $response = $this->get('/');
        $response->assertRedirect('home');
        $response->assertRedirect('FileManager');

        $response->assertStatus(200);
    }
}
