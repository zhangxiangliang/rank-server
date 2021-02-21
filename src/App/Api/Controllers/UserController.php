<?php

namespace App\Api\Controllers;

use Illuminate\Routing\Controller;
use Domain\User\Resources\UserResource;
use Domain\User\Actions\CreateWechatUserAction;
use Domain\User\DataTransferObjects\CreateWechatUserData;

class UserController extends Controller
{
    /**
     * 用户登录
     *
     * @return \Domain\User\Resources\UserResource
     */
    public function login()
    {
        // 请求数据
        $wechatUserData = CreateWechatUserData::fromRequest();

        // 处理数据
        $user = (new CreateWechatUserAction)($wechatUserData);

        // 响应数据
        return new UserResource($user);
    }
}
