<?php

namespace Database\Seeders;

use Domain\Star\Actions\CreateStarAction;
use Domain\Star\DataTransferObjects\CreateStarData;
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
        $stars = [
            // T0
            ['douyin_id' => 'dqsQwQ', 'douyin_name' => '电气鼠', 'douyin_link' => "https://v.douyin.com/JogUTAf"],

            // T0.5
            ['douyin_id' => 'Kohhkohhk', 'douyin_name' => '蒹葭苍苍', 'douyin_link' => "https://v.douyin.com/JopFjTy"],
            ['douyin_id' => 'Lulubiu1104', 'douyin_name' => '卢卢biu🍓', 'douyin_link' => "https://v.douyin.com/JogTq9e"],
            ['douyin_id' => 'yl0330yl', 'douyin_name' => '小月亮🌙', 'douyin_link' => "https://v.douyin.com/Jogwxoq"],
            ['douyin_id' => 'shenyuyu1201', 'douyin_name' => '小飞鱼🐟', 'douyin_link' => "https://v.douyin.com/Jopd5G9"],
            ['douyin_id' => 'Sunqiaqia', 'douyin_name' => '野原葵奈子r', 'douyin_link' => "https://v.douyin.com/JopLp3C"],

            // T1
            ['douyin_id' => 'zxb872323', 'douyin_name' => '是小贝呀', 'douyin_link' => "https://v.douyin.com/Jop8Rhu"],
            ['douyin_id' => '23182472', 'douyin_name' => '小兔啵啵', 'douyin_link' => "https://v.douyin.com/JopPD6M"],
            ['douyin_id' => 'seven770615', 'douyin_name' => '柒柒✨', 'douyin_link' => "https://v.douyin.com/JopB3jt"],
            ['douyin_id' => 'Fayee20', 'douyin_name' => '鱼呀', 'douyin_link' => "https://v.douyin.com/Jop47py"],
            ['douyin_id' => 'npainimen', 'douyin_name' => '奶片', 'douyin_link' => "https://v.douyin.com/JopCv3T"],

            ['douyin_id' => 'dybioxhiuyts', 'douyin_name' => '小小小文🍭', 'douyin_link' => "https://v.douyin.com/JopSvke"],
            ['douyin_id' => 'plmm1001', 'douyin_name' => 'Cici🦋', 'douyin_link' => "https://v.douyin.com/JopBufw"],
            ['douyin_id' => '39128861', 'douyin_name' => '清婉🧸', 'douyin_link' => "https://v.douyin.com/JopSQ4c"],
            ['douyin_id' => '576530192', 'douyin_name' => '林筱雨 🌈', 'douyin_link' => "https://v.douyin.com/Jop5bbK"],

            // T2
            ['douyin_id' => '23333quan', 'douyin_name' => '圈圈🎀', 'douyin_link' => "https://v.douyin.com/Jopm1hW"],
            ['douyin_id' => '71515336', 'douyin_name' => '糖果果🍬🍬', 'douyin_link' => "https://v.douyin.com/JoprUpv"],
            ['douyin_id' => 'OvO1988', 'douyin_name' => '糊涂猫', 'douyin_link' => "https://v.douyin.com/JopQK2K"],
            ['douyin_id' => 'chu718355', 'douyin_name' => '初7', 'douyin_link' => "https://v.douyin.com/JopftNB"],
            ['douyin_id' => 'kezheneee', 'douyin_name' => '珂镇恶', 'douyin_link' => "https://v.douyin.com/JopmohT"],

            ['douyin_id' => '175973073', 'douyin_name' => '兔宝🍓', 'douyin_link' => "https://v.douyin.com/JopAX6d"],
            ['douyin_id' => 'zzz102799', 'douyin_name' => 'Fairy.', 'douyin_link' => "https://v.douyin.com/JopSfHb"],
            ['douyin_id' => 'piggy847', 'douyin_name' => '米其林猪崽', 'douyin_link' => "https://v.douyin.com/Jop5G1W"],
            ['douyin_id' => '18989805', 'douyin_name' => '乔可爱', 'douyin_link' => "https://v.douyin.com/JopDpKT"],
            ['douyin_id' => '335910956', 'douyin_name' => '小鹿十七🍋', 'douyin_link' => "https://v.douyin.com/JopBAJC"],

            ['douyin_id' => '6134328', 'douyin_name' => '沙雕的悦悦', 'douyin_link' => "https://v.douyin.com/JopVS83"],
            ['douyin_id' => '66buling88', 'douyin_name' => 'Liipp逃逃🍑', 'douyin_link' => "https://v.douyin.com/JopP8Ee"],
            ['douyin_id' => 'xiantong905', 'douyin_name' => '冉囡囡', 'douyin_link' => "https://v.douyin.com/JopfXy8"],
            ['douyin_id' => 'h02130710', 'douyin_name' => '鹿岛埋', 'douyin_link' => "https://v.douyin.com/Jopqt7X"],
            ['douyin_id' => 'KURI_F', 'douyin_name' => '恶霸九栗', 'douyin_link' => "https://v.douyin.com/JopAB3W"],

            ['douyin_id' => 'BQ200127', 'douyin_name' => '博乾 .', 'douyin_link' => "https://v.douyin.com/JopbbAU"],
            ['douyin_id' => 'ailele312', 'douyin_name' => '奈子', 'douyin_link' => "https://v.douyin.com/Jopxa5P"],
            ['douyin_id' => 'zsx0304_', 'douyin_name' => '小愛同學', 'douyin_link' => "https://v.douyin.com/JopVCj1"],
            ['douyin_id' => 'sweetni02', 'douyin_name' => '甜豆腻', 'douyin_link' => "https://v.douyin.com/Jop5a2m"],
        ];

        collect($stars)->map(function ($star) {
            // 模拟请求数据
            $request = request();
            $request['douyin_id'] = $star['douyin_id'];
            $request['douyin_name'] = $star['douyin_name'];
            $request['douyin_link'] = $star['douyin_link'];

            $createStarData = CreateStarData::fromRequest();
            (new CreateStarAction)($createStarData);
        });
    }
}
