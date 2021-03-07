<?php

namespace Domain\Star\Actions;

use Domain\Star\DataTransferObjects\CreateVideoData;
use Domain\Star\Models\Video;

class CreateVideoAction
{
    public function __invoke(CreateVideoData $createVideoData): Video
    {
        $video = Video::updateOrCreate(
            ['douyin_id' => $createVideoData->douyin_id],
            $createVideoData->toArray()
        );

        return $video;
    }
}
