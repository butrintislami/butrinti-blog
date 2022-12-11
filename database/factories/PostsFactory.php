<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id = User::pluck('id')->toArray();
        return [
            'user_id'=> Arr::random($user_id),
            'title'=> $this->faker->sentence(),
            'description'=>$this->faker->paragraph(4),

        ];
    }
}
