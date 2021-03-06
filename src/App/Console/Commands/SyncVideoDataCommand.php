<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SyncVideoDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'video:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync Video Data Command';

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
     * @return void
     */
    public function handle()
    {
    }
}
