<?php

namespace Domain\Star\Actions;

use Domain\Star\DataTransferObjects\CreateStarData;
use Domain\Star\Models\Star;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CreateStarAction
{
    public function __invoke(): LengthAwarePaginator
    {
        $stars = Star::paginate(25);

        return $stars;
    }
}
