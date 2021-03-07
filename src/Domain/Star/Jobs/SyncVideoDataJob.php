<?php

namespace Domain\Star\Jobs;

use Domain\Star\Actions\CreateVideoAction;
use Domain\Star\DataTransferObjects\StarData;
use Domain\Star\DataTransferObjects\CreateVideoData;
use Http;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\Process\Process;

class SyncVideoDataJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * 抖音数据
     *
     * @var Domain\Star\DataTransferObjects\StarData
     */
    private StarData $star;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(StarData $star)
    {
        $this->star = $star;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // 获取主页信息
        $params = [];

        // 运行脚本
        $process = new Process(['node', base_path() . DIRECTORY_SEPARATOR . 'douyin.js', $this->star->douyin_link]);
        $process->run();

        // 截取数据
        $output = json_decode(trim($process->getOutput()), true);
        $params = $output['video'];

        // 获取用户信息
        $cursor = 0;
        while (true) {
            $url = "https://www.iesdouyin.com/web/api/v2/aweme/post";
            $response = Http::get($url, array_merge($params, ['max_cursor' => $cursor]));
            $data = $response->json();

            if (count($data["aweme_list"]) === 0) {
                break;
            }

            $videos = $data["aweme_list"];
            $cursor = $data["max_cursor"];

            for ($i = 0; $i < count($videos); $i++) {
                $video = $videos[$i];

                $request = request();
                $request['star_id'] = (int)$this->star->id;
                $request['douyin_id'] = (string)$video['aweme_id'];

                $request['douyin_description'] = (string)$video['desc'];
                $request['douyin_cover'] = (string)$video['video']['cover']['url_list'][0];
                $request['douyin_link'] = (string)$video['video']['play_addr']['url_list'][0];
                $request['douyin_dynamic'] = (string)$video['video']['dynamic_cover']['url_list'][0];

                $request['douyin_liked'] = (int)$video['statistics']['digg_count'];
                $request['douyin_shared'] = (int)$video['statistics']['share_count'];
                $request['douyin_commented'] = (int)$video['statistics']['comment_count'];

                $syncVideoData = CreateVideoData::fromRequest();
                (new CreateVideoAction)($syncVideoData);
            }
        }
    }
}
