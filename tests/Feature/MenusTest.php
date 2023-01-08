<?php

namespace Tests\Feature;

use App\Models\Menu;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MenusTest extends TestCase
{
    use RefreshDatabase;

    public function test_menus_page_contains_empty_table()
    {
        $response = $this->get('/menus');
        $response->assertStatus(200);
        $response->assertSee(__('No Dishes Found'));
    }

    public function test_menus_page_contains_non_empty_table()
    {
        Menu::create(['name' => 'checken', 'duration' => 2]);
        $response = $this->get('/menus');
        $response->assertStatus(200);
        $response->assertDontSee(__('No Dishes Found'));
    }
}
