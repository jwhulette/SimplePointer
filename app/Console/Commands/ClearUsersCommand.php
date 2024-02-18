<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;

class ClearUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pointer:clear-users {now?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Remove unused users';

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
        $days = 7;

        $now = $this->argument('now');

        if (isset($now)) {
            $days = 0;
        }

        User::query()->where('created_at', '<', Date::now()->subDays($days))->delete();
    }
}
