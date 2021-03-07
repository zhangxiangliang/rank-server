<?php

namespace Domain\Star\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CreateVideoData extends DataTransferObject
{
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
     * 格式化请求数据
     *
     * @return self
     */
    public static function fromRequest(): self
    {
        $data = request()->only([
            // 索引相关
            'star_id',

            // 抖音数据
            'douyin_id',
            'douyin_link',
            'douyin_cover',
            'douyin_dynamic',
            'douyin_description',

            // 本地数据
            'douyin_liked',
            'douyin_shared',
            'douyin_commented'
        ]);

        return new self([
            // 索引相关
            'star_id' => $data['star_id'],

            // 抖音数据
            'douyin_id' => $data['douyin_id'],
            'douyin_link' => $data['douyin_link'],
            'douyin_cover' => $data['douyin_cover'],
            'douyin_dynamic' => $data['douyin_dynamic'],
            'douyin_description' => $data['douyin_description'],

            // 本地数据
            'douyin_liked' => $data['douyin_liked'],
            'douyin_shared' => $data['douyin_shared'],
            'douyin_commented' => $data['douyin_commented'],
        ]);
    }
}
