<?php

namespace Domain\Star\Actions;

use Domain\Star\DataTransferObjects\CreateStarData;
use Domain\Star\Models\Star;

class CreateStarAction
{
    public function __invoke(CreateStarData $createStarData): Star
    {
        $star = Star::firstOrCreate(
            ['douyin_id' => $createStarData->douyin_id],
            $createStarData->toArray()
        );

        return $star;
    }
}
