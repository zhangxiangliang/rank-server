<?php

namespace Database\Factories;

use Domain\Star\Models\Star;
use Illuminate\Database\Eloquent\Factories\Factory;

class StarFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Star::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'douyin_id' => $this->faker->randomAscii,
            'douyin_name' => $this->faker->name,
            'douyin_avatar' =>$this->faker->imageUrl(),

            'douyin_focus'=> 0,
            'douyin_follower' => 0,
            'douyin_liked' => 0,
            'douyin_video' => 0,
            'douyin_like' => 0,
        ];
    }
}
