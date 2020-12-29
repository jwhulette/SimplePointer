<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Spatie\DbDumper\Databases\Sqlite;

class DatabaseBackupCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup the database';

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
        File::ensureDirectoryExists(storage_path('dumps'));

        $dump = storage_path('dumps/simplepointer_dump.sql');

        $databaseFile = storage_path('database.sqlite');

        Sqlite::create()
            ->setDbName($databaseFile)
            ->dumpToFile($dump);

        return 0;
    }
}
