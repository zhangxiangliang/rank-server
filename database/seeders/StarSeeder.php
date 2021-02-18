<?php

namespace Database\Seeders;

use Domain\Star\Actions\CreateBaseStarAction;
use Domain\Star\DataTransferObjects\CreateBaseStarData;
use Illuminate\Database\Seeder;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $douyinIds = [
            // T0
            'dqsQwQ',

            // T0.5
            'Kohhkohhk',
            'Lulubiu1104',
            'yl0330yl',
            'shenyuyu1201',
            'Sunqiaqia',

            // T1
            'zxb872323', '23182472', 'seven770615', 'Fayee20', 'npainimen',
            'dybioxhiuyts', 'plmm1001', '10187914', '39128861', '576530192',

            // T2
            '23333quan', 'xiaomaolong.', '71515336', 'OvO1988', 'chu718355',
            'kezheneee', '175973073', 'zzz102799', 'piggy847', '18989805',
            '335910956', '6134328', '66buling88', 'xiantong905', 'h02130710',
            'KURI_F', 'BQ200127', 'ailele312', 'zsx0304_', 'sweetni02',
        ];

        collect($douyinIds)->map(function ($id) {
            // 模拟请求数据
            $request = request();
            $request['douyin_id'] = $id;

            $baseStarData = CreateBaseStarData::fromRequest();
            (new CreateBaseStarAction)($baseStarData);
        });
    }
}
