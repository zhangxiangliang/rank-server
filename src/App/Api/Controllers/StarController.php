<?php

namespace App\Api\Controllers;

use Domain\Star\Models\Star;
use Domain\Star\Resources\StarCollection;
use Illuminate\Routing\Controller;

class StarController extends Controller
{
    /**
     * 用户登录
     *
     * @return \Domain\User\Resources\StarCollection
     */
    public function index()
    {
        // 请求数据
        $stars = Star::paginate(25);

        // 响应数据
        return new StarCollection($stars);
    }
}
