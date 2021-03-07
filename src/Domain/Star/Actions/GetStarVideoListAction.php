<?php

namespace Domain\Star\Actions;

use Domain\Star\Models\Star;
use Domain\Star\DataTransferObjects\StarData;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GetStarVideoListAction
{
    public function __invoke(StarData $starData): LengthAwarePaginator
    {
        $star = Star::find($starData->id);
        $videos = $star->videos()->orderBy('douyin_liked', 'desc')->paginate(25);

        return $videos;
    }
}
