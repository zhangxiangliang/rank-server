<?php

namespace Domain\Log\DataTransferObjects;

use Domain\Log\Models\Log;
use Illuminate\Support\Carbon;
use Spatie\DataTransferObject\DataTransferObject;

class CreateLogData extends DataTransferObject
{
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
     * @var Illuminate\Support\Carbon
     */
    public Carbon $created_at;

    /**
     * 格式化请求数据
     *
     * @return self
     */
    public static function fromRequest(): self
    {
        $data = request()->only(['version', 'content', 'created_at']);

        $data = Log::firstOrNew(['version' => $data['version']], [
            'version' => $data['version'],
            'content' => $data['content'],
            'created_at' => $data['created_at'],
        ]);

        return new self([
            'version' => $data['version'],
            'content' => $data['content'],
            'created_at' => $data['created_at'],
        ]);
    }
}
