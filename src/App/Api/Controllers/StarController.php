<?php

namespace App\Api\Controllers;

use Illuminate\Routing\Controller;
use Domain\Star\Resources\StarCollection;
use Domain\Star\Actions\GetStarListAction;

class StarController extends Controller
{
    /**
     * 抖音列表
     *
     * @return \Domain\User\Resources\StarCollection
     */
    public function index()
    {
        // 请求数据
        $stars = (new GetStarListAction)();

        // 响应数据
        return new StarCollection($stars);
    }
}
