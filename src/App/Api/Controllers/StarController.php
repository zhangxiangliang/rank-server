<?php

namespace App\Api\Controllers;

use Illuminate\Routing\Controller;
use Domain\Star\Resources\StarResource;
use Domain\Star\Resources\StarCollection;
use Domain\Star\Resources\VideoCollection;
use Domain\Star\Actions\GetStarItemAction;
use Domain\Star\Actions\GetStarListAction;
use Domain\Star\Actions\GetStarVideoListAction;
use Domain\Star\DataTransferObjects\StarData;

class StarController extends Controller
{
    /**
     * 抖音列表
     *
     * @return \Domain\Star\Resources\StarCollection
     */
    public function index()
    {
        // 请求数据
        $stars = (new GetStarListAction)();

        // 响应数据
        return new StarCollection($stars);
    }

    /**
     * 抖音详情
     *
     * @return \Domain\Star\Resources\StarResource
     */
    public function show()
    {
        // 请求数据
        $starData = StarData::fromRequest();
        $star = (new GetStarItemAction)($starData);

        // 响应数据
        return new StarResource($star);
    }

    /**
     * 抖音视频
     *
     * @return \Domain\Star\Resources\VideoCollection
     */
    public function videos()
    {
        // 请求数据
        $starData = StarData::fromRequest();
        $videos = (new GetStarVideoListAction)($starData);

        // 响应数据
        return new VideoCollection($videos);
    }
}
