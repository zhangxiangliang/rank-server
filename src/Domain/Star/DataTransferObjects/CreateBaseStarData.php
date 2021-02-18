<?php

namespace Domain\Star\DataTransferObjects;

use Domain\Star\Models\Star;
use Spatie\DataTransferObject\DataTransferObject;

class CreateBaseStarData extends DataTransferObject
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
     * 抖音关注数
     *
     * @var int
     */
    public int $douyin_focus;

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
        $data = request()->only(['douyin_id']);

        $star = Star::firstOrNew(['douyin_id' => $data['douyin_id']], [
            'douyin_id' => $data['douyin_id'],
            'douyin_name' => '',
            'douyin_avatar' =>'',

            'douyin_focus'=> 0,
            'douyin_follower' => 0,
            'douyin_liked' => 0,
            'douyin_video' => 0,
            'douyin_like' => 0,
        ]);

        return new self([
            'douyin_id' => $star['douyin_id'],
            'douyin_name' => $star['douyin_name'],
            'douyin_avatar' => $star['douyin_avatar'],

            'douyin_focus' => $star['douyin_focus'],
            'douyin_follower' => $star['douyin_follower'],
            'douyin_liked' => $star['douyin_liked'],
            'douyin_video' => $star['douyin_video'],
            'douyin_like' => $star['douyin_like'],
        ]);
    }
}
