<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Posts;
use App\Models\Replies;
use App\Models\User;
use App\Models\Admin;
use App\Models\User_details;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
        'name' => 'Butrint',
        'email' => 'butrint@gmail.com',
        'role'=>'admin',
        'email_verified_at' => now(),
        'password' => Hash::make('butrinti'),
        'remember_token' => Str::random(10),
    ]);
        User::factory(10)->create();
        User_details::factory(10)->create();
        Posts::factory(10)->create();
        Replies::factory(10)->create();

    }
}
