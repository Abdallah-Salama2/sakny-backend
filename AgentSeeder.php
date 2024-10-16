<?php

namespace Database\Seeders;

use Illuminate\Support\Str;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('agents')->insert([
            [
                'name' => "Eslam Hawas",
                'image_url' => "https://y-sooty-seven.vercel.app/AgentProfiles/Eslam.jpeg",
                'email' => "Eslam@gmail.com",
                'phone' => fake()->phoneNumber,
                'password' => bcrypt("123456789"),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "Anas Saleh",
                'image_url' => "https://y-sooty-seven.vercel.app/AgentProfiles/Anas.jpeg",
                'email' => "Anas@gmail.com",
                'phone' => fake()->phoneNumber,
                'password' => bcrypt("123456789"),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "Abdelrahman Fathy",
                'image_url' => "https://y-sooty-seven.vercel.app/AgentProfiles/Abdelrhaman.PNG",
                'email' => "Abdelrahman@gmail.com",
                'phone' => fake()->phoneNumber,
                'password' => bcrypt("123456789"),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "Abdallah Fawzi",
                'image_url' => "https://y-sooty-seven.vercel.app/AgentProfiles/Abdallah.jpg",
                'email' => "Abdallah@gmail.com",
                'phone' => fake()->phoneNumber,
                'password' => bcrypt("123456789"),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "Mohammed Mamdouh",
                'image_url' => "https://y-sooty-seven.vercel.app/AgentProfiles/mohamed.jpg",
                'email' => "Mohammed@gmail.com",
                'phone' => fake()->phoneNumber,
                'password' => bcrypt("123456789"),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "Aly Assem",
                'image_url' => "https://y-sooty-seven.vercel.app/AgentProfiles/aly.PNG",
                'email' => "Aly@gmail.com",
                'phone' => fake()->phoneNumber,
                'password' => bcrypt("123456789"),
                'remember_token' => Str::random(10),
            ],

        ]);

        //

    }
}
