<?php

namespace Domain\Star\DataTransferObjects;

use Domain\Star\Models\Star;
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
     * 抖音权重
     *
     * @var int
     */
    public int $weight;

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

        // 获取数据
        $star = Star::query()
            ->where(['douyin_id' => $data['douyin_id']])
            ->first();

        // 计算公式
        $data['douyin_video'] = $star->videos()->count();
        $data['weight']  = $data['douyin_liked'] == 0 ? 0 : $data['douyin_liked'] / $data['douyin_follower'] * 1000;

        return new self([
            'douyin_id' => (string)$data['douyin_id'],
            'douyin_name' => (string)$data['douyin_name'],
            'douyin_link' => (string)$data['douyin_link'],

            'douyin_avatar' => (string)$data['douyin_avatar'],
            'douyin_description' => (string)$data['douyin_description'],

            'douyin_following' => (int)$data['douyin_following'],
            'douyin_follower' => (int)$data['douyin_follower'],
            'douyin_liked' => (int)$data['douyin_liked'],
            'douyin_video' => (int)$data['douyin_video'],
            'douyin_like' => (int)$data['douyin_like'],
            'weight' => (int)$data['weight'],
        ]);
    }
}
