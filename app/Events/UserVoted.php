<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class UserVoted extends Event implements ShouldBroadcastNow
{
    use Dispatchable;

    use InteractsWithSockets;

    use SerializesModels;

    public array $vote;

    public string $roomId;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(string $roomId, int $userid, int $vote)
    {
        $this->roomId = $roomId;

        $this->vote = [
            'userid' => $userid,
            'vote' => $vote,
        ];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PresenceChannel('room' . $this->roomId);
    }
}
