<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_register_new_user(): void
    {
        $userData = [
            'first_name' => 'Teste',
            'last_name' => 'Campêlo',
            'login' => 'nometeste',
            'phone' => '(99)99999-9999',
            'group' => 'common',
            'status' => '1',
            'email' => 'teste@gmail.com',
            'password' => '12345678',
        ];
        $response = $this->json('POST', '/api/register', $userData);

        $response->assertStatus(201);

        $this->assertDatabaseHas('users', [
            'login' => 'nometeste'
        ]);
    }
}
