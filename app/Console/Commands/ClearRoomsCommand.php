<?php

namespace App\Console\Commands;

use App\Room;
use Carbon\Carbon;
use Illuminate\Console\Command;

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

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $days = 30;

        $now = $this->argument('now');

        if (isset($now)) {
            $days = 0;
        }

        Room::where('last_used_at', '<', Carbon::now()->subDays($days))->delete();
    }
}
