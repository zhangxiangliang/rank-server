<?php

namespace Domain\Star\Actions;

use Domain\Star\DataTransferObjects\StarData;
use Domain\Star\Models\Star;

class GetStarItemAction
{
    public function __invoke(StarData $starData): Star
    {
        $star = Star::find($starData->id);
        return $star;
    }
}
