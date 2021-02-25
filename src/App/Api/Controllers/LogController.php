<?php

namespace App\Api\Controllers;

use Illuminate\Routing\Controller;
use Domain\Log\Resources\LogCollection;
use Domain\Log\Actions\GetLogListAction;

class LogController extends Controller
{
    /**
     * 抖音列表
     *
     * @return \Domain\User\Resources\LogCollection
     */
    public function index()
    {
        // 请求数据
        $logs = (new GetLogListAction)();

        // 响应数据
        return new LogCollection($logs);
    }
}
