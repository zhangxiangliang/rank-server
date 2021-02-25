<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Domain\Log\Actions\CreateLogAction;
use Domain\Log\DataTransferObjects\CreateLogData;

class LogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logs = [
            ['version' => '0.0.1', 'created_at' => '2021-02-14', 'content' => ["增加电气鼠排行榜"]],
            ['version' => '0.0.2', 'created_at' => '2021-02-24', 'content' => ["增加电气鼠头像", "增加电气鼠账号复制", "增加底部导航栏和我的功能"]],
            ['version' => '0.0.3', 'created_at' => '2021-02-26', 'content' => ["增加小程序分享功能", "增加日志功能"]],
        ];

        collect($logs)->map(function ($log) {
            // 模拟请求数据
            $request = request();
            $request['version'] = $log['version'];
            $request['created_at'] = $log['created_at'];
            $request['content'] = $log['content'];

            $createLogData = CreateLogData::fromRequest();
            (new CreateLogAction)($createLogData);
        });
    }
}
