<?php

namespace Domain\Star\Jobs;

use Domain\Star\Actions\SyncStarAction;
use Domain\Star\DataTransferObjects\StarData;
use Domain\Star\DataTransferObjects\SyncStarData;
use Http;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncStarDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * 抖音数据
     *
     * @var Domain\Star\DataTransferObjects\StarData
     */
    private StarData $star;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(StarData $star)
    {
        $this->star = $star;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // 获取主页信息
        $params = [];
        $response = Http::get($this->star->douyin_link);
        parse_str($response->effectiveUri()->getQuery(), $params);

        // 获取用户信息
        $response = Http::get("https://www.iesdouyin.com/web/api/v2/user/info/?sec_uid={$params['sec_uid']}");
        $data = $response->json();
        $user = $data["user_info"];

        $request = request();
        $request['douyin_id'] =  $this->star->douyin_id;
        $request['douyin_name'] =  $this->star->douyin_name;
        $request['douyin_link'] =  $this->star->douyin_link;


        $request["douyin_following"] = (int)$user["following_count"];
        $request["douyin_follower"] = (int)$user["follower_count"];
        $request["douyin_avatar"] = (string)$user["avatar_larger"]['url_list'][0];

        $request["douyin_liked"] = (int)$user["total_favorited"];
        $request["douyin_video"] = (int)$user["aweme_count"];
        $request["douyin_like"] = (int)$user["favoriting_count"];

        $syncStarData = SyncStarData::fromRequest();
        (new SyncStarAction)($syncStarData);
    }
}
