<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertRedirect('/dashboard');
    }

    public function testDashboard()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(200)
            ->assertViewIs('dashboard.index')
            ->assertSee('主控台');
    }
}
