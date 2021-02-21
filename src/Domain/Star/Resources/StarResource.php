<?php

namespace Domain\Star\Resources;

use Domain\Star\DataTransferObjects\StarData;
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
        return StarData::fromModel($this->resource)->toArray();
    }
}
