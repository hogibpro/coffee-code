<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class IndustryTypeTest extends TestCase
{
    use WithoutMiddleware;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
    }

    public function testIndex1()
    {
        $response = $this->get(route('industry-type.index'), [
            'sort' => 'id',
            'order' => 'asc',
            'name' => '売'
        ]);
        $response->assertStatus(200);
    }

    public function testIndex2()
    {
        $response = $this->get(route('industry-type.index', [
            'is_include_deleted' => 'true',
            'sort' => 'id',
            'order' => 'asc',
            'name' => '売'
        ]));
        $response->assertStatus(200);
    }

    public function testGetAll1()
    {
        $response = $this->get('/api/v1/m/industry-type/all', [
            'sort' => 'id',
            'order' => 'asc'
        ]);
        $response->assertStatus(200);
    }

    public function testShow()
    {
        $response = $this->get('/api/v1/m/industry-type/2');
        $response->assertStatus(200);
    }

    public function testShowFailure()
    {
        $response = $this->get('/api/v1/m/industry-type/999999');
        $response->assertStatus(404);
    }

    public function testUpdate1()
    {
        // 情報取得
        $response = $this->get('/api/v1/m/industry-type/2');
        $params = json_decode($response->content(), true);
        $params['name'] = '学校';
        $params['note'] = '改行があれば改行して表示します。';

        // 情報更新
        $response = $this->put('/api/v1/m/industry-type/2', $params);
        $response->assertStatus(200);
        $this->assertTrue($response['name'] === "学校");
        $this->assertTrue($response['note'] === "改行があれば改行して表示します。");
    }

    public function testUpdate2()
    {
        $params = ['name' => '学校'];
        // 情報更新
        $response = $this->put('/api/v1/m/industry-type/2', $params);
        $response->assertStatus(200);
        $this->assertTrue($response['name'] === "学校");
    }

    public function testUpdateFailure1()
    {
        // 情報取得
        $response = $this->get('/api/v1/m/industry-type/2');
        $params = json_decode($response->content(), true);
        $faker = \Faker\Factory::create('ja_JP');
        $params['name'] = $faker->text(500);

        // 情報更新
        $response = $this->put('/api/v1/m/industry-type/2', $params);
        $response->assertStatus(422);
    }

    public function testUpdateFailure2()
    {
        // 情報取得
        $response = $this->get('/api/v1/m/industry-type/2');
        $params = json_decode($response->content(), true);

        // 存在しないユーザ
        $response = $this->put('/api/v1/m/industry-type/999999', $params);
        $response->assertStatus(404);
    }

    public function testUpdateFailure3()
    {
        $params = ['name' => null, 'note' => null];
        // 情報更新
        $response = $this->put('/api/v1/m/industry-type/2', $params);
        $response->assertStatus(422);
    }

    public function testUpdateFailure4()
    {
        $params = [];

        // 情報更新
        $response = $this->put('/api/v1/m/industry-type/2', $params);
        $response->assertStatus(422);
    }

    public function testDestroy()
    {
        $response = $this->delete('/api/v1/m/industry-type/22');
        $response->assertStatus(204);
    }

    public function testDestroyFailure()
    {
        $response = $this->delete('/api/v1/m/industry-type/999999');
        $response->assertStatus(404);
    }

    public function testStore1()
    {
        $faker = \Faker\Factory::create('ja_JP');
        $response = $this->post('/api/v1/m/industry-type', [
            'name' => $faker->jobTitle(),
            'note' => $faker->realText(),
        ]);
        $response->assertStatus(201);
    }

    public function testStore2()
    {
        $faker = \Faker\Factory::create('ja_JP');
        $response = $this->post('/api/v1/m/industry-type', [
            'name' => $faker->jobTitle(),
        ]);
        $response->assertStatus(201);
    }

    public function testStoreFailure1()
    {
        $faker = \Faker\Factory::create('ja_JP');
        $response = $this->post('/api/v1/m/industry-type', [
            'name' => $faker->text(500),
            'note' => $faker->realText(),
        ]);
        $response->assertStatus(422);
    }

    public function testStoreFailure2()
    {
        $faker = \Faker\Factory::create('ja_JP');
        $response = $this->post('/api/v1/m/industry-type', [
            'note' => $faker->realText(),
        ]);
        $response->assertStatus(422);
    }

    public function testStoreFailure3()
    {
        $faker = \Faker\Factory::create('ja_JP');
        $response = $this->post('/api/v1/m/industry-type', []);
        $response->assertStatus(422);
    }
}