<?php

declare(strict_types=1);

namespace Tests\Browser;

use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use PHPUnit\Framework\Attributes\Test;
use Tests\DuskTestCase;

class CreateRoomTest extends DuskTestCase
{
    use WithFaker;

    #[Test]
    public function user_can_create_new_room(): void
    {
        $this->browse(function (Browser $browser): void {
            $browser->visit('/')
                ->assertSee('Simple Pointer')
                ->type('name', fake()->word())
                ->select('card_set')
                ->press('Create Room')
                ->assertPathIsNot('/home');
        });
    }
}
