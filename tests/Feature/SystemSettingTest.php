<?php

namespace Tests\Feature;

use App\Models\SystemSetting;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;
use Database\Seeders\SystemSettingsSeeder;

class SystemSettingTest extends TestCase
{
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testFeeDetail()
    {
        //正常系
        $response = $this->get('/api/v1/s/fee');
        $response->assertStatus(200);
    }

    public function testFeeDetailFailure404()
    {
        //truncate data table system_settings
        Schema::disableForeignKeyConstraints();
        SystemSetting::truncate();
        Schema::enableForeignKeyConstraints();

        //会費が存在しません。
        $response = $this->get('/api/v1/s/fee');
        $response->assertStatus(404);

        //reset data test
        $test = new SystemSettingsSeeder();
        $test->run();
    }

    public function testFeeUpdate()
    {
        //正常系
        $response = $this->post('/api/v1/s/fee',[
            'professional_member_fee' => 11111,
            'proAttend_partner_fee' => 11111
        ]);
        $response->assertStatus(200);
        $this->assertTrue($response['professional_member_fee'] === 11111);
        $this->assertTrue($response['proAttend_partner_fee'] === 11111);
    }

    public function testFeeUpdateFailure404()
    {
        //truncate data table system_settings
        Schema::disableForeignKeyConstraints();
        SystemSetting::truncate();
        Schema::enableForeignKeyConstraints();

        //更新対象の会費が存在しません。
        $response = $this->post('/api/v1/s/fee',[
            'professional_member_fee' => 11111,
            'proAttend_partner_fee' => 11111
        ]);
        $response->assertStatus(404);

        //reset data test
        $test = new SystemSettingsSeeder();
        $test->run();
    }


    public function testFeeUpdateFailure422()
    {
        //バリデーションエラー

        //professional member feeは、必ず指定してください。
        //pro attend partner feeは、必ず指定してください。
        $response = $this->post('/api/v1/s/fee',[]);
        $response->assertStatus(422);

        //professional member feeには、整数を指定してください。
        //pro attend partner feeには、整数を指定してください。
        $response = $this->post('/api/v1/s/fee',[
            'professional_member_fee' => 'abc',
            'proAttend_partner_fee' => 'abc'
        ]);
        $response->assertStatus(422);

        //professional member feeには、0以上の数字を指定してください。
        //pro attend partner feeには、0以上の数字を指定してください。
        $response = $this->post('/api/v1/s/fee',[
            'professional_member_fee' => -1,
            'proAttend_partner_fee' => -1
        ]);
        $response->assertStatus(422);

        //professional member feeには、2147483647以下の数字を指定してください。
        //pro attend partner feeには、2147483647以下の数字を指定してください。
        $response = $this->post('/api/v1/s/fee',[
            'professional_member_fee' => 2147483648,
            'proAttend_partner_fee' => 2147483648
        ]);
        $response->assertStatus(422);
    }

    public function testMemberPolicyDetail()
    {
        //正常系
        $response = $this->get('/api/v1/s/member-policy');
        $response->assertStatus(200);
    }

    public function testMemberPolicyDetailFailure404()
    {
        //truncate data table system_settings
        Schema::disableForeignKeyConstraints();
        SystemSetting::truncate();
        Schema::enableForeignKeyConstraints();

        //会員規約が存在しません。
        $response = $this->get('/api/v1/s/member-policy');
        $response->assertStatus(404);

        //reset data test
        $test = new SystemSettingsSeeder();
        $test->run();
    }

    public function testMemberPolicyUpdate()
    {
        $response = $this->post('/api/v1/s/member-policy',[
            'members_terms' => 'member policy update'
        ]);
        $response->assertStatus(200);
        $this->assertTrue($response['members_terms'] === 'member policy update');
    }

    public function testMemberPolicyUpdateFailure404()
    {
        //truncate data table system_settings
        Schema::disableForeignKeyConstraints();
        SystemSetting::truncate();
        Schema::enableForeignKeyConstraints();

        //更新対象の会員規約が存在しません。
        $response = $this->post('/api/v1/s/member-policy',[
            'members_terms' => 'member policy update'
        ]);
        $response->assertStatus(404);

        //reset data test
        $test = new SystemSettingsSeeder();
        $test->run();
    }

    public function testMemberPolicyUpdateFailure422()
    {
        //バリデーションエラー
        //members termsは、必ず指定してください。
        $response = $this->post('/api/v1/s/member-policy',[
            'members_terms' => ''
        ]);
        $response->assertStatus(422);
    }

    public function testPrivacyPolicyDetail()
    {
        //正常系
        $response = $this->get('/api/v1/s/privacy-policy');
        $response->assertStatus(200);
    }

    public function testPrivacyPolicyDetailFailure404()
    {
        //truncate data table system_settings
        Schema::disableForeignKeyConstraints();
        SystemSetting::truncate();
        Schema::enableForeignKeyConstraints();

        //個人情報取り扱いが存在しません。
        $response = $this->get('/api/v1/s/privacy-policy');
        $response->assertStatus(404);

        //reset data test
        $test = new SystemSettingsSeeder();
        $test->run();
    }

    public function testPrivacyPolicyUpdate()
    {
        //正常系
        $response = $this->post('/api/v1/s/privacy-policy',[
            'privacy_policy' => 'privacy_policy update'
        ]);
        $response->assertStatus(200);
        $this->assertTrue($response['privacy_policy'] === 'privacy_policy update');
    }

    public function testPrivacyPolicyUpdateFailure404()
    {
        //truncate data table system_settings
        Schema::disableForeignKeyConstraints();
        SystemSetting::truncate();
        Schema::enableForeignKeyConstraints();

        //更新対象の個人情報取り扱いが存在しません。
        $response = $this->post('/api/v1/s/privacy-policy',[
            'privacy_policy' => 'privacy_policy update'
        ]);
        $response->assertStatus(404);

        //reset data test
        $test = new SystemSettingsSeeder();
        $test->run();
    }

    public function testPrivacyPolicyUpdateFailure422()
    {
        //privacy policyは、必ず指定してください。
        $response = $this->post('/api/v1/s/privacy-policy',[
            'privacy_policy' => null
        ]);
        $response->assertStatus(422);
    }
}
