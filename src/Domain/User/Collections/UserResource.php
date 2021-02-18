<?php

namespace Domain\User\Collections;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mobile' => $this->mobile,
            'openid' => $this->openid,

            'token' => $this->token ?? '',
            'avatar' => $this->avatar,
            'username' => $this->username,
        ];
    }
}
