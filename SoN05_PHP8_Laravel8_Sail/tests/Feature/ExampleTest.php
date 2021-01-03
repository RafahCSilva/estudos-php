<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHomeResponseStatus(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testAuthentication(): void
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->get('/dashboard');
        $response->assertStatus(200);

    }

    public function testDatabaseUser(): void
    {
        User::factory()->create([
            'email' => 'teste@teste.com.br'
        ]);
        $this->assertDatabaseHas('users', [
            'email' => 'teste@teste.com.br'
        ]);
    }
}
