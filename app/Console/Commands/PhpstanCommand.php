<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class PhpstanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'phpstan';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run phpstan';

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
     * @return int
     */
    public function handle()
    {
        $phpstan = new Process(['composer', 'phpstan']);

        $phpstan->run();

        echo $phpstan->getOutput();

        return 0;
    }
}
