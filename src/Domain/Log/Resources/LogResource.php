<?php

namespace Domain\Log\Resources;

use Domain\Log\DataTransferObjects\LogData;
use Illuminate\Http\Resources\Json\JsonResource;

class LogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return LogData::fromModel($this->resource)->toArray();
    }
}
