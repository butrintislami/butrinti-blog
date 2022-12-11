<?php

namespace Database\Factories;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Replies>
 */
class RepliesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition()
    {
        $user_id = User::pluck('id')->toArray();
        $post_id = Posts::pluck('id')->toArray();
        return [
            'user_id'=> Arr::random($user_id),
            'post_id'=> Arr::random($post_id),
            'comment'=>$this->faker->sentence(),

        ];
    }
}
