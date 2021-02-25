<?php

namespace Domain\Log\DataTransferObjects;

use Domain\Log\Models\Log;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class LogData extends DataTransferObject
{
    /**
     * 主键
     *
     * @var int
     */
    public int $id;

    /**
     * 版本号
     *
     * @var string
     */
    public string $version;

    /**
     * 更新内容
     *
     * @var array
     */
    public array $content;

    /**
     * 创建时间
     *
     * @var string
     */
    public string $created_at;

    /**
     * 格式化模型数据
     *
     * @return self
     */
    public static function fromModel(Log $log): self
    {
        return new self([
            'id' => $log->id,
            'version' => $log->version,
            'content' => $log->content,
            'created_at' => $log->created_at->format("Y-m-d"),
        ]);
    }
}
