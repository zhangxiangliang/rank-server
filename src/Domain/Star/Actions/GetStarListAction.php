<?php

namespace Domain\Star\Actions;

use Domain\Star\Enums\StarStatusEnum;
use Domain\Star\Models\Star;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetStarListAction
{
    public function __invoke(): LengthAwarePaginator
    {
        $stars = Star::query()
            ->orderBy('weight', 'desc')
            ->where('status', StarStatusEnum::RUNNING())
            ->paginate(25);

        return $stars;
    }
}
