<?php

namespace Domain\Star\Resources;

use Domain\Star\DataTransferObjects\VideoData;
use Illuminate\Http\Resources\Json\JsonResource;

class StarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return VideoData::fromModel($this->resource)->toArray();
    }
}
