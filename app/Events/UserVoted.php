<?php

declare(strict_types=1);

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserVoted extends Event implements ShouldBroadcastNow
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /** @var array<string,string|int> */
    public array $vote;

    public function __construct(public string $roomId, int $userid, int $vote)
    {
        $this->vote = [
            'userid' => $userid,
            'vote'   => $vote,
        ];
    }

    public function broadcastOn(): Channel
    {
        return new PresenceChannel('room' . $this->roomId);
    }
}
