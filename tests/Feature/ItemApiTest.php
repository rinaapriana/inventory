<?php

namespace Tests\Feature;

use Tests\TestCase;

class ItemApiTest extends TestCase
{
    /**
     * Test mendapatkan semua item
     */
    public function test_get_all_items(): void
    {
        $response = $this->getJson('/api/items');

        $response->assertStatus(200);
    }

    /**
     * Test halaman utama
     */
    public function test_home_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Test endpoint categories
     */
    public function test_get_categories(): void
    {
        $response = $this->getJson('/api/categories');

        $response->assertStatus(200);
    }

    /**
     * Test login tanpa data
     */
    public function test_login_without_data(): void
    {
        $response = $this->postJson('/api/login', []);

        $this->assertTrue(
            in_array($response->status(), [401, 422])
        );
    }
}