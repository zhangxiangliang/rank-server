<?php

namespace Domain\Star\Actions;

use Domain\Star\DataTransferObjects\SyncStarData;
use Domain\Star\Models\Star;

class SyncStarAction
{
    public function __invoke(SyncStarData $syncStarData)
    {
        // 更新数据
        Star::where('douyin_id', $syncStarData->douyin_id)
            ->update($syncStarData->toArray());
    }
}
