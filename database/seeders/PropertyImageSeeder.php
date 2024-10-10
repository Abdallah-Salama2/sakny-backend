<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertyImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        //
        DB::table('property_images')->insert([
            //1
            [
                'filename' => "Apartment-1/1.png",
                'property_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-1/2.png",
                'property_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-1/3.png",
                'property_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //2
            [
                'filename' => "Apartment-2/11.jpg",
                'property_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-2/12.jpg",
                'property_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-2/13.jpg",
                'property_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            //3
            [
                'filename' => "apartment-3/11.jpg",
                'property_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "apartment-3/12.jpg",
                'property_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "apartment-3/13.jpg",
                'property_id' => 3,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'filename' => "Apartment-4/11.jpg",
                'property_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-4/12.jpg",
                'property_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-4/13.jpg",
                'property_id' => 4,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'filename' => "Apartment-5/11.jpg",
                'property_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-5/12.jpg",
                'property_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-5/13.jpg",
                'property_id' => 5,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'filename' => "Apartment-6/11.jpg",
                'property_id' => 6,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-6/12.jpg",
                'property_id' => 6,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-6/13.jpg",
                'property_id' => 6,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'filename' => "Apartment-7/11.jpg",
                'property_id' => 7,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-7/12.jpg",
                'property_id' => 7,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-7/13.jpg",
                'property_id' => 7,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'filename' => "Apartment-8/11.jpg",
                'property_id' => 8,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-8/12.jpg",
                'property_id' => 8,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-8/13.jpg",
                'property_id' => 8,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'filename' => "Apartment-9/11.jpg",
                'property_id' => 9,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-9/12.jpg",
                'property_id' => 9,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-9/13.jpg",
                'property_id' => 9,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'filename' => "Apartment-10/11.jpg",
                'property_id' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-10/12.jpg",
                'property_id' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-10/13.jpg",
                'property_id' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'filename' => "Apartment-11/11.jpg",
                'property_id' => 11,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-11/12.jpg",
                'property_id' => 11,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'filename' => "Apartment-11/13.jpg",
                'property_id' => 11,
                'created_at' => $now,
                'updated_at' => $now,
            ],


        ]);
    }
}
