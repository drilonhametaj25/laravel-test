<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BrewerieTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->post('/api/auth/login', ["email" => "prova@prova.it", "password" => "password"]);

        $response->assertStatus(200);

        $response = $this->post('/api/breweries', ['headers' => ['Authorization' => 'Bearer '.$response['authorisation']['token']]]);

        $response->assertStatus(200);
    }
}
