<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ControllerRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page()
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);

        $response->assertSee('Welcome to Simple Pointer');

        $response->assertViewHas('cards');
    }

    public function test_about_page()
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);

        $response->assertViewIs('about');
    }

    public function test_what_page()
    {
        $response = $this->get(route('what'));

        $response->assertStatus(200);

        $response->assertViewIs('what');
    }

    public function test_terms_page()
    {
        $response = $this->get(route('terms'));

        $response->assertStatus(200);

        $response->assertViewIs('terms');
    }

    public function test_ads_page()
    {
        $response = $this->get(route('ads'));

        $response->assertStatus(200);

        $response->assertViewIs('ads');
    }
}
