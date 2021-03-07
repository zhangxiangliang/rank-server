<?php

namespace App\Console\Commands;

use Domain\Star\Models\Star;
use Domain\Star\Jobs\SyncVideoDataJob;
use Domain\Star\DataTransferObjects\StarData;
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
        Star::all()
            ->map(fn ($star) => StarData::fromModel($star))
            ->map(fn ($star) => SyncVideoDataJob::dispatch($star));
    }
}
