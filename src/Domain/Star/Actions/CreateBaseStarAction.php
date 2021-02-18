<?php

namespace Domain\Star\Actions;

use Domain\Star\DataTransferObjects\CreateBaseStarData;
use Domain\Star\Models\Star;

class CreateBaseStarAction
{
    public function __invoke(CreateBaseStarData $baseStarData): Star
    {
        $star = Star::firstOrCreate(['douyin_id' => $baseStarData->douyin_id], $baseStarData->all());

        return $star;
    }
}
