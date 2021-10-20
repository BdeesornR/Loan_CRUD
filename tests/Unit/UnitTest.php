<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;
use App\Models\Loans;

class UnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testConnection()
    {
        $response = $this->get('/');
//        dd($response->json());
        $response->assertStatus(200);
        $response->assertSee('Loan');
    }

    public function testDatabase()
    {
        $Loans = Loans::factory()->count(5)->make();
//        dd($Loans);
    }
}
