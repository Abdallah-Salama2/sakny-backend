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
                'image_url' => "http://127.0.0.1:8000/AgentProfiles/Eslam.jpeg",
                'email' => "Eslam@gmail.com",
                'phone' => fake()->phoneNumber,
                'password' => bcrypt("123456789"),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "Anas Saleh",
                'image_url' => "http://127.0.0.1:8000/AgentProfiles/Anas.jpeg",
                'email' => "Anas@gmail.com",
                'phone' => fake()->phoneNumber,
                'password' => bcrypt("123456789"),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => "Abdelrahman Fathy",
                'image_url' => "http://127.0.0.1:8000/AgentProfiles/Abdelrhaman.PNG",
                'email' => "Abdelrahman@gmail.com",
                'phone' => fake()->phoneNumber,
                'password' => bcrypt("123456789"),
                'remember_token' => Str::random(10),
            ],

        ]);

        //

    }
}
