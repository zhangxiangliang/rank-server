<?php

namespace Domain\Star\Actions;

use Domain\Star\Models\Star;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetStarListAction
{
    public function __invoke(): LengthAwarePaginator
    {
        $stars = Star::paginate(25);

        return $stars;
    }
}
