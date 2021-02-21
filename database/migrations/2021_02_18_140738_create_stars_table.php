<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stars', function (Blueprint $table) {
            // 索引相关
            $table->bigIncrements('id')->comment('索引: 主键');

            // 抖音数据
            $table->string('douyin_id')->default('')->comment('索引: 抖音账号');
            $table->string('douyin_link')->default('')->comment('属性: 抖音链接');
            $table->string('douyin_name')->default('')->comment('属性: 抖音用户名');
            $table->string('douyin_avatar')->default('')->comment('属性: 抖音头像');

            $table->unsignedBigInteger('douyin_following')->default(0)->comment('属性: 抖音关注数');
            $table->unsignedBigInteger('douyin_follower')->default(0)->comment('属性: 抖音粉丝数');
            $table->unsignedBigInteger('douyin_liked')->default(0)->comment('属性: 抖音点赞数');
            $table->unsignedBigInteger('douyin_video')->default(0)->comment('属性: 抖音视频数');
            $table->unsignedBigInteger('douyin_like')->default(0)->comment('属性: 抖音喜欢数');

            // 本地数据
            $table->unsignedBigInteger('liked')->default(0)->comment('索引: 点赞数');
            $table->unsignedBigInteger('follower')->default(0)->comment('索引: 粉丝数');

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
        Schema::dropIfExists('stars');
    }
}
