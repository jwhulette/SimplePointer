<?php

namespace Tests\Feature;

use Tests\TestCase;

class ControllerRoutesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

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
        $this->markTestSkipped('TODO');

        $response = $this->get(route('ads'));

        $response->assertStatus(200);

        $response->assertViewIs('ads');
    }
}
