<?php

namespace Domain\User\DataTransferObjects;

use Str;
use Hash;
use EasyWeChat;
use Domain\User\Models\User;
use Spatie\DataTransferObject\DataTransferObject;

class CreateWechatUserData extends DataTransferObject
{
    /**
     * 手机
     *
     * @var string
     */
    public string $mobile;

    /**
     * OpenID
     *
     * @var string
     */
    public string $openid;

    /**
     * SessionKey
     *
     * @var string
     */
    public string $session_key;

    /**
     * 头像
     *
     * @var string
     */
    public string $avatar;

    /**
     * 用户名
     *
     * @var string
     */
    public string $username;

    /**
     * 密码
     *
     * @var string
     */
    public string $password;

    /**
     * 格式化请求数据
     *
     * @return self
     */
    public static function fromRequest(): self
    {
        $wechat = EasyWeChat::miniProgram();
        $authorization = $wechat->auth->session(request()->post('code'));

        $user = User::firstOrNew(['openid' => $authorization['openid']], [
            'mobile' => $authorization['openid'],
            'openid' => $authorization['openid'],
            'session_key' => $authorization['session_key'],

            'avatar' => '',
            'username' => '',
            'password' => Hash::make(Str::random(12)),
        ]);

        return new self([
            'mobile' => $user['mobile'],
            'openid' => $user['openid'],
            'session_key' => $user['session_key'],

            'avatar' => $user['avatar'],
            'username' => $user['username'],
            'password' => $user['password'],
        ]);
    }
}
