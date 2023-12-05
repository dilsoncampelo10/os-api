<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_user_can_authenticate_with_correct_credentials(): void
    {
        $user = User::factory()->create([
            'login' => 'nometeste',
            'password' => bcrypt('12345678'),
        ]);

        $credentials = [
            'login' => 'nometeste',
            'password' => '12345678',
        ];
        $response = $this->json('POST', '/api/login', $credentials);

        $response->assertStatus(201)
            ->assertJsonStructure([
                'user',
                'token',
            ]);
    }

    public function test_user_cannot_authenticate_with_incorrect_credentials()
    {
        $user = User::factory()->create([
            'login' => 'nometeste',
            'password' => bcrypt('12345678'),
        ]);

        $credentials = [
            'login' => 'nometeste',
            'password' => '87654321',
        ];

        $response = $this->json('POST', '/api/login', $credentials);

        $response->assertStatus(403)
            ->assertJson([
                'message' => 'The provided credentials are incorrect.'
            ]);
    }
}
