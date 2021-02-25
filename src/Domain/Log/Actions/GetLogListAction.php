<?php

namespace Domain\Log\Actions;

use Domain\Log\DataTransferObjects\CreateLogData;
use Domain\Log\Models\Log;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetLogListAction
{
    public function __invoke(): LengthAwarePaginator
    {
        $logs = Log::orderBy('id', 'desc')->paginate(25);

        return $logs;
    }
}
