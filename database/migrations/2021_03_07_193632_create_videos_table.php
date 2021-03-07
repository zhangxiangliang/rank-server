<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            // 索引相关
            $table->bigIncrements('id')->comment('索引: 主键');
            $table->unsignedBigInteger('star_id')->default(0)->comment('索引: 视频ID');

            // 抖音数据
            $table->string('douyin_id')->default('')->comment('属性: 抖音视频ID');
            $table->string('douyin_cover')->default('')->comment('属性: 抖音视频封面');
            $table->string('douyin_dynamic')->default('')->comment('属性: 抖音动态封面');
            $table->string('douyin_link', 512)->default('')->comment('属性: 抖音视频链接');
            $table->string('douyin_description', 1024)->default('')->comment('属性: 抖音视频描述');

            $table->unsignedBigInteger('douyin_liked')->default(0)->comment('属性: 抖音点赞数');
            $table->unsignedBigInteger('douyin_shared')->default(0)->comment('属性: 抖音分享数');
            $table->unsignedBigInteger('douyin_commented')->default(0)->comment('属性: 抖音评论数');

            // 本地数据
            $table->unsignedBigInteger('liked')->default(0)->comment('属性: 点赞数');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
