<?php

namespace Tests\Feature;

use App\Models\IpInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ApiControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_ping_returns_pong()
    {
        $response = $this->get('/api/ping');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'time'
            ])
            ->assertJson([
                'message' => 'pong'
            ]);
    }

    public function test_ipinfo_returns_correct_ip()
    {
        $response = $this->get('/api/ipinfo');

        $response->assertStatus(200)
            ->assertJsonStructure(['ip']);
    }

    public function test_ipdb_stores_ip_and_returns_last_requests()
    {
        $response = $this->post('/api/ipdb');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'current_ip',
                'last_requests'
            ]);

        $this->assertDatabaseHas('ip_infos', [
            'ip_address' => $response->json('current_ip')
        ]);
    }

    public function test_ipset_validates_and_stores_message()
    {
        $message = 'Test message';
        $params = ['extra' => 'param'];

        $response = $this->postJson('/api/ipset', [
            'message' => $message,
            ...array_merge($params)
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'success' => true,
                'message' => $message,
                'params' => $params
            ]);

        $this->assertDatabaseHas('ip_infos', [
            'params' => json_encode($params)
        ]);
    }

    public function test_ipset_fails_without_message()
    {
        $response = $this->postJson('/api/ipset', []);

        $response->assertStatus(422)
            ->assertJsonValidationErrors(['message']);
    }
} 