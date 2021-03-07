<?php

namespace Domain\Star\DataTransferObjects;

use Domain\Star\Models\Video;
use Spatie\DataTransferObject\DataTransferObject;

class VideoData extends DataTransferObject
{
    /**
     * ID
     *
     * @var int
     */
    public int $id;

    /**
     * 抖音ID
     *
     * @var int
     */
    public int $star_id;

    /**
     * 抖音ID
     *
     * @var string
     */
    public string $douyin_id;

    /**
     * 抖音视频链接
     *
     * @var string
     */
    public string $douyin_link;

    /**
     * 抖音视频封面
     *
     * @var string
     */
    public string $douyin_cover;

    /**
     * 抖音动态封面
     *
     * @var string
     */
    public string $douyin_dynamic;

    /**
     * 抖音视频描述
     *
     * @var string
     */
    public string $douyin_description;

    /**
     * 抖音点赞数
     *
     * @var int
     */
    public int $douyin_liked;

    /**
     * 抖音分享数
     *
     * @var int
     */
    public int $douyin_shared;

    /**
     * 抖音评论数
     *
     * @var int
     */
    public int $douyin_commented;

    /**
     * 点赞数
     *
     * @var int
     */
    public int $liked;

    /**
     * 格式化模型数据
     *
     * @return self
     */
    public static function fromModel(Video $video): self
    {
        $params = http_build_query([
            'video_id' => $video->douyin_link,
            'line' => '0',
            'ratio' => '540p',
            'media_type' => '4',
            'vr_type' => '0',
            'improve_bitrate' => '0',
            'is_play_url'=>'1',
            'is_support_h265'=>'0',
            'source'=>'PackSourceEnum_PUBLISH',
        ]);

        $url = "https://aweme.snssdk.com/aweme/v1/play/?${params}";

        return new self([
            'id' => $video->id,

            // 索引相关
            'star_id' => $video->star_id,

            // 抖音数据
            'douyin_id' => $video->douyin_id,
            'douyin_link' => $url,
            'douyin_cover' => $video->douyin_cover,
            'douyin_dynamic' => $video->douyin_dynamic,
            'douyin_description' => $video->douyin_description,

            // 本地数据
            'douyin_liked' => $video->douyin_liked,
            'douyin_shared' => $video->douyin_shared,
            'douyin_commented' => $video->douyin_commented,
            'liked' => $video->liked,
        ]);
    }

    /**
     * 格式化请求数据
     *
     * @return self
     */
    public static function fromRequest(): self
    {
        $data = [];
        $data['id'] = (int)request()->route('id');

        return new self([
            'id' => $data['id'],

            // 索引相关
            'star_id' => 0,

            // 抖音数据
            'douyin_id' => '',
            'douyin_link' => '',
            'douyin_cover' => '',
            'douyin_dynamic' => '',
            'douyin_description' => '',

            // 本地数据
            'douyin_liked' => 0,
            'douyin_shared' => 0,
            'douyin_commented' => 0,
            'liked' => 0,
        ]);
    }
}
