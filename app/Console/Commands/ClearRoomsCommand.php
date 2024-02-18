<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Room;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;

class ClearRoomsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pointer:clear-rooms {now?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear rooms';

    public function handle(): void
    {
        $days = 30;

        $now = $this->argument('now');

        if (isset($now)) {
            $days = 0;
        }

        Room::query()->where('last_used_at', '<', Date::now()->subDays($days))->delete();
    }
}
