<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Loans;

class UnitTest extends TestCase
{
    use RefreshDatabase;

    public function addDefaultRecord()
    {
        Loans::factory()->create();
    }

    public function testViewsResponse()
    {
        $response_welcome = $this->get('/');
        $response_welcome->assertStatus(200);
        $response_main = $this->get('/main');
        $response_main->assertStatus(200);
        $response_create = $this->get('/create');
        $response_create->assertStatus(200);
    }

    public function testFetchingDb()
    {
        $this->addDefaultRecord();
        $record = Loans::findOrFail(1);
        $this->assertEquals(10000.00, $record->loan_amount);
    }

    public function testDetailsResponse()
    {
        $this->addDefaultRecord();
        $response_details = $this->get('/details/1');
        $response_details->assertStatus(200);
        $props = $response_details->getOriginalContent()->getData()['repayTable'];
        $this->assertEquals(0, end($props)['balance']);
    }

    public function testEditResponse()
    {
        $this->addDefaultRecord();
        $response_edit = $this->get('/edit/1');
        $response_edit->assertStatus(200);
        $request_edit = $this->post('/edit/1', [
            'amount' => 20000.00,
            'term' => 1,
            'interest' => 15,
            'start_date' => [
                'month' => '06',
                'year' => '2021'
            ],
        ]);
        $dt = Carbon::create("2021", "06", "01");
        $record = Loans::findOrFail(1);
        $this->assertEquals(20000.00, $record->loan_amount);
        $this->assertEquals(1, $record->loan_term);
        $this->assertEquals(15, $record->interest_rate);
        $this->assertEquals($dt, $record->start_date);
        $request_edit->assertRedirect('/details/1');
    }

    public function testCreatingRecord()
    {
        $response_create = $this->post('/create', [
            'amount' => 20000.00,
            'term' => 1,
            'interest' => 12,
            'start_date' => [
                'month' => '07',
                'year' => '2021'
            ],
        ]);
        $dt = Carbon::create("2021", "07", "01");
        $record = Loans::findOrFail(1);
        $this->assertEquals(20000.00, $record->loan_amount);
        $this->assertEquals(1, $record->loan_term);
        $this->assertEquals(12, $record->interest_rate);
        $this->assertEquals($dt, $record->start_date);
        $response_create->assertRedirect('/details/1');
    }

    public function testDeletingRecord()
    {
        $this->addDefaultRecord();
        $response_delete = $this->delete('/del/1');
        $this->assertDeleted('main_loans', [
            'id' => '1',
        ]);
        $response_delete->assertRedirect('/main');
    }
}
