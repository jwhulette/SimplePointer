<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Str;
use App\Events\ClearVotesEvent;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VotesControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testClearVotes()
    {
        $this->markTestSkipped('must be revisited.');

        Event::fake();

        Http::put(route('clear'), [
            'roomid'=> Str::uuid(),
        ]);

        Event::assertDispatched(ClearVotesEvent::class);
    }
}
