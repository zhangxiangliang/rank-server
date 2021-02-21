<?php

namespace Domain\User\Actions;

use Auth;
use Domain\User\DataTransferObjects\CreateWechatUserData;
use Domain\User\Models\User;

class CreateWechatUserAction
{
    public function __invoke(CreateWechatUserData $wechatUserData): User
    {
        $user = User::firstOrCreate(
            ['openid' => $wechatUserData->openid],
            $wechatUserData->toArray()
        );

        return $user;
    }
}
