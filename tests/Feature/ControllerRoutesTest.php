<?php

declare(strict_types=1);

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class ControllerRoutesTest extends TestCase
{
    #[Test]
    public function home_page(): void
    {
        $response = $this->get(route('home'));

        $response->assertStatus(200);

        $response->assertSee('Welcome to Simple Pointer');

        $response->assertViewHas('cards');
    }

    #[Test]
    public function about_page(): void
    {
        $response = $this->get(route('about'));

        $response->assertStatus(200);

        $response->assertViewIs('about');
    }

    #[Test]
    public function what_page(): void
    {
        $response = $this->get(route('what'));

        $response->assertStatus(200);

        $response->assertViewIs('what');
    }

    #[Test]
    public function terms_page(): void
    {
        $response = $this->get(route('terms'));

        $response->assertStatus(200);

        $response->assertViewIs('terms');
    }

//    public function test_ads_page(): void
//    {
//        $response = $this->get(route('ads'));
//
//        $response->assertStatus(200);
//
//        $response->assertViewIs('ads');
//    }
}
