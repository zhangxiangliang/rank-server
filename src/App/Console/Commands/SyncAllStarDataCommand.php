<?php

namespace App\Console\Commands;

use Domain\Star\DataTransferObjects\StarData;
use Domain\Star\Jobs\SyncStarDataJob;
use Domain\Star\Models\Star;
use Illuminate\Console\Command;

class SyncAllStarDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'star:sync-all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync All Star Data Command';

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
            ->map(fn ($star) => SyncStarDataJob::dispatch($star));
    }
}
