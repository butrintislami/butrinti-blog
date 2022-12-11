<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User_details>
 */
class User_DetailsFactory extends Factory
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
            'user_id'=>Arr::random($user_id),
            'company'=>$this->faker->company(),
            'address'=>$this->faker->address(),
            'city'=>$this->faker->city(),
        ];
    }
}
