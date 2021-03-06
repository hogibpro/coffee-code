<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\Billing;
use Tests\TestCase;

class BillingTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testupdateBillTrue()
    {
        $data = Billing::where('status', 1)->first();

        $response = $this->post('/api/v1/billing/m/'.$data->id.'/fix');
        $response->assertStatus(200);
    }

    public function testupdateBillFalse1()
    {
        $data = Billing::where('status', 3)->first();

        $response = $this->post('/api/v1/billing/m/'.$data->id.'/fix');
        $response->assertStatus(400);
    }

    public function testupdateBillFalse2()
    {
        $response = $this->post('/api/v1/billing/m/99999/fix');
        $response->assertStatus(404);
    }

    public function testFix1()
    {
        $response = $this->post('/api/v1/billing/2333-44/fix');
        $response->assertStatus(404);
    }

    public function testFix2()
    {
        $data = Billing::where('status', 1)->first();
        $time = explode('-', $data->billing_month);
        $response = $this->post('/api/v1/billing/'.$time[0].'-'.$time[1].'/fix');
        $response->assertStatus(200);
    }
    public function testFix3()
    {
        $data = Billing::where('status', 2)->first();
        $time = explode('-', $data->billing_month);
        $response = $this->post('/api/v1/billing/'.$time[0].'-'.$time[1].'/fix');
        $response->assertStatus(400);
    }

    public function testIndex1()
    {
        $response = $this->get('/api/v1/billing?name=喜嶋 知実&status[]=1&kinds[0]=-M-&kinds[1]=-S-&start_settlement_date=2021-11-20 10:00:00&end_settlement_date=2021-11-20 10:00:00');
        $response->assertStatus(200);
    }

    public function testIndex2()
    {
        $response = $this->get('/api/v1/billing');
        $response->assertStatus(200);
    }

    public function testIndex3()
    {
        $response = $this->get('/api/v1/billing?member_number=XXX120');
        $response->assertStatus(200);
    }

    public function testshow1()
    {
        $response = $this->get('/api/v1/billing/show/1');
        $response->assertStatus(200);
    }

    public function testshow2()
    {
        $response = $this->get('/api/v1/billing/show/777777');
        $response->assertStatus(404);
    }


    public function testPDF()
    {
        $response = $this->get('/api/v1/billing/77777777777/pdf');
        $response->assertStatus(404);
    }

    public function testPDF2()
    {
        $response = $this->get('/api/v1/billing/7/pdf');
        $response->assertStatus(200);
    }

    public function testUpdate1()
    {
        $response = $this->get('/api/v1/billing/7');
        $params = [
            "member_note" => "改行があれば改行して表示します",
            "user_note" => "学校",
            "billing_details" => [(
                [
                    "id" => "16",
                    "billing_id" => "7",
                    "name" => "田辺",
                    "price" => "242000"
                ]
            )]
        ];

        $response = $this->put('/api/v1/billing/7', $params);
        $response->assertStatus(200);
    }

    public function testUpdate2()
    {
        $response = $this->get('/api/v1/billing/7');
        $params = [
            "member_note" => "改行があれば改行して表示します。",
            "user_note" => "学校",
            "billing_details" => []
        ];

        $response = $this->put('/api/v1/billing/7', $params);
        $response->assertStatus(200);
    }

    public function testUpdate3()
    {
        $response = $this->get('/api/v1/billing/7');
        $params = [
            "member_note" => "改行があれば改行して表示します。",
        ];

        $response = $this->put('/api/v1/billing/7', $params);
        $response->assertStatus(200);
    }

    public function testUpdate4()
    {
        $response = $this->get('/api/v1/billing/7');
        $params = [
            "user_note" => "学校",
        ];

        $response = $this->put('/api/v1/billing/7', $params);
        $response->assertStatus(200);
    }

    public function testUpdate5()
    {
        $response = $this->get('/api/v1/billing/7');
        $params = [
            "member_note" => "改行があれば改行して表示します。",
            "user_note" => "学校",
            "billing_details" => [(
                [
                    "id" => "16",
                    "billing_id" => "7",
                    "name" => "田辺",
                    "price" => "242000"
                ]
            )]
        ];

        $response = $this->put('/api/v1/billing/77777777', $params);
        $response->assertStatus(404);
    }

    public function testExclude1()
    {
        $response = $this->get('/api/v1/billing/m/exclude');
        $params = ["billing_id" => ["7"]];

        $response = $this->post('/api/v1/billing/m/exclude', $params);
        $response->assertStatus(200);
    }

    public function testExclude2()
    {
        $response = $this->get('/api/v1/billing/m/exclude');
        $params = ["billing_id" => ["7777777"]];
        $response = $this->post('/api/v1/billing/m/exclude', $params);
        $response->assertStatus(404);
    }


    public function testTarget1()
    {
        $response = $this->get('/api/v1/billing/m/target');
        $params = ["billing_id" => [7, 8, 9]];

        $response = $this->post('/api/v1/billing/m/target', $params);
        $response->assertStatus(200);
    }

    public function testCancelTrue()
    {
        $data = Billing::where('status', 2)->first();
        $response = $this->post('/api/v1/billing/'.$data->id.'/cancel');
        $response->assertStatus(200);
    }

    public function testCancelFalse1()
    {
        $data = Billing::where('status', 3)->first();

        $response = $this->post('/api/v1/billing/'.$data->id.'/cancel');
        $response->assertStatus(400);
    }

    public function testCancelFalse2()
    {
        $response = $this->post('/api/v1/billing/99999/cancel');
        $response->assertStatus(404);
    }

}
