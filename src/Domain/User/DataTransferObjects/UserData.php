<?php

namespace Domain\User\DataTransferObjects;

use Auth;
use Domain\User\Models\User;
use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    /**
     * ID
     *
     * @var int
     */
    public int $id = 0;

    /**
     * 手机
     *
     * @var string
     */
    public string $mobile = '';

    /**
     * OpenID
     *
     * @var string
     */
    public string $openid = '';

    /**
     * SessionKey
     *
     * @var string
     */
    public string $session_key = '';

    /**
     * 头像
     *
     * @var string
     */
    public string $avatar = '';

    /**
     * 用户名
     *
     * @var string
     */
    public string $username = '';

    /**
     * Token
     *
     * @var string
     */
    public string $token = '';

    /**
     * 格式化模型数据
     *
     * @return self
     */
    public static function fromModel(User $user): self
    {
        return new static([
            'id' => $user->id,
            'mobile' => $user->mobile,
            'openid' => $user->openid,
            'session_key' => $user->session_key,
            'avatar' => $user->avatar,
            'username' => $user->username,
            'token' => Auth::login($user),
        ]);
    }
}
