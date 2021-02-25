<?php

namespace Domain\Log\Actions;

use Domain\Log\DataTransferObjects\CreateLogData;
use Domain\Log\Models\Log;

class CreateLogAction
{
    public function __invoke(CreateLogData $createLogData): Log
    {
        $log = Log::firstOrCreate(
            ['version' => $createLogData->version],
            $createLogData->toArray()
        );

        return $log;
    }
}
