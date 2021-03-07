<?php

namespace Domain\Star\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class SyncStarData extends DataTransferObject
{
    /**
     * 抖音ID
     *
     * @var string
     */
    public string $douyin_id;

    /**
     * 抖音名
     *
     * @var string
     */
    public string $douyin_name;

    /**
     * 抖音头像
     *
     * @var string
     */
    public string $douyin_avatar;

    /**
     * 抖音描述
     *
     * @var string
     */
    public string $douyin_description;

    /**
     * 抖音链接
     *
     * @var string
     */
    public string $douyin_link;

    /**
     * 抖音关注数
     *
     * @var int
     */
    public int $douyin_following;

    /**
     * 抖音粉丝数
     *
     * @var int
     */
    public int $douyin_follower;

    /**
     * 抖音点赞数
     *
     * @var int
     */
    public int $douyin_liked;

    /**
     * 抖音视频数
     *
     * @var int
     */
    public int $douyin_video;

    /**
     * 抖音喜欢数
     *
     * @var int
     */
    public int $douyin_like;

    /**
     * 格式化请求数据
     *
     * @return self
     */
    public static function fromRequest(): self
    {
        $data = request()->only([
            'douyin_id',
            'douyin_name',
            'douyin_link',

            'douyin_avatar',
            'douyin_description',

            'douyin_following',
            'douyin_follower',
            'douyin_liked',
            'douyin_video',
            'douyin_like'
        ]);

        return new self([
            'douyin_id' => $data['douyin_id'],
            'douyin_name' => $data['douyin_name'],
            'douyin_link' => $data['douyin_link'],

            'douyin_avatar' => $data['douyin_avatar'],
            'douyin_description' => $data['douyin_description'],

            'douyin_following' => $data['douyin_following'],
            'douyin_follower' => $data['douyin_follower'],
            'douyin_liked' => $data['douyin_liked'],
            'douyin_video' => $data['douyin_video'],
            'douyin_like' => $data['douyin_like'],
        ]);
    }
}
