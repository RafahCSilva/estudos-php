<?php

namespace Tests\Feature;

use App\Models\Account;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Collection;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use DatabaseMigrations;

    public function testApiList(): void
    {
        // dd([
        //     'User'    => User::factory()->create()->toArray(),
        //     'Account' => Account::factory()->create()->toArray(),
        //     'Bank'    => Bank::factory()->create()->toArray(),
        // ]);
        $data = Account::factory(20)->create();
        $response = $this->get('/api/accounts');

        $response
            ->assertStatus(200)
            ->assertJson([
                'data' => $data->toArray()
            ]);
    }

    public function testApiListWithParamsOrder(): void
    {
        /** @var Collection|Account[] $data */
        $data = Account::factory(3)->create();


        // http://localhost/api/banks?order=balance,desc
        $this
            ->get('/api/accounts?order=balance,desc')
            ->assertStatus(200)
            ->assertJson([
                'data' => $data->sortByDesc('balance')->values()->toArray()
            ]);
    }

    public function testApiListWithParamsLimit(): void
    {
        /** @var Collection|Account[] $data */
        $data = Account::factory(20)->create();

        // http://localhost/api/banks?limit=3
        $this
            ->get('/api/accounts?limit=3')
            ->assertStatus(200)
            ->assertJsonCount(3, 'data');
    }

    public function testApiListWithParamsLike(): void
    {
        /** @var Collection|Account[] $data */
        $data = Account::factory(20)->create();

        // http://localhost/api/accounts?like=title,itau
        $this
            ->get('/api/accounts?like=title,'.$data[5]->title)
            ->assertStatus(200)
            ->assertJsonFragment($data[5]->toArray());
    }

    public function testApiView(): void
    {
        /** @var Account $data */
        $data = Account::factory()->create();
        $response = $this->json('GET', '/api/accounts/'.$data->id);
        $response
            ->assertStatus(200)
            ->assertJson($data->toArray());
    }

    public function testApiViewNotFount(): void
    {
        $response = $this->json('GET', '/api/accounts/1');
        $response
            ->assertStatus(404);
    }

    public function testApiStore(): void
    {
        /** @var Account $data */
        $data = Account::factory()->make();
        $response = $this->json('POST', '/api/accounts/', $data->toArray());
        $response
            ->assertStatus(200)
            ->assertJson($data->toArray());
    }

    public function testApiUpdate(): void
    {
        $update = ['title' => 'ALTERADO'];
        $this->json('PUT', '/api/accounts/123', $update)->assertStatus(404);


        /** @var Account $data */
        $data = Account::factory()->create();

        $response = $this->json('PUT', '/api/accounts/'.$data->id, $update);
        $response
            ->assertStatus(200)
            ->assertJson($update);

        $this->assertEquals('ALTERADO', Account::find($data->id)->title);
    }

    public function testApiDestroy(): void
    {
        $response = $this->json('DELETE', '/api/accounts/1');
        $response->assertStatus(404);

        /** @var Account $data */
        $data = Account::factory()->create();
        $this->assertNotNull(Account::find($data->id));

        $response = $this->json('DELETE', '/api/accounts/'.$data->id);
        $response->assertStatus(200);

        $this->assertNull(Account::find($data->id));
    }
}
