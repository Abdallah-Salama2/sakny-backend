<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $now = Carbon::now();

        // Insert data into the products table
        DB::table('properties')->insert([
            // Insert data into the products table
            [
                "by_agent_id" => 1,
                'title' =>         "Apartment",
                'description' =>   "20045 sq ft / 190 sq m, Unit type: apartment",
                'city' =>          "Giza",
                'address' =>       "Al-Muqaddas Al-Qabbari Street, the International Garden, at the end of Abbas Al-Akkad, Nasr City",
                'latitude' =>      "30.061",
                'longitude' =>     "31.344",
                'beds' =>          "3",
                'baths' =>         "2",
                'area' =>          "20045",
                'property_date' => $now,
                'price' =>         "500000",
                'status' =>        "Available",
                'type' =>          "For Sale",
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // 2
            [
                "by_agent_id" => 2,
                'title' =>         "Apartment ",
                'description' =>   "220 sq m, 4 rooms including a master room, 3 bathrooms, kitchen, located in Block 204",
                'city' =>          "Cairo",
                'address' =>       "Hisham Hossam Street, 8th District, Nasr City",
                'latitude' =>      "30.061361",
                'longitude' =>     "31.344962",
                'beds' =>          "4",
                'baths' =>         "3",
                'area' =>          "220",
                'property_date' => $now,
                'price' =>         "54750",
                'status' =>        "Available",
                'type' =>          "For Rent",
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // 3
            [
                "by_agent_id" => 3,
                'title' =>         "Apartment ",
                'description' =>   "135 sq m, 3 bedrooms, 3 bathrooms, Super Lux finishing, Ready for delivery",
                'city' =>          "Cairo",
                'address' =>       "Capital East Compound, Nasr City",
                'latitude' =>      "30.062607251224858",
                'longitude' =>     "31.34380659453395",
                'beds' =>          "3",
                'baths' =>         "3",
                'area' =>          "135",
                'property_date' => $now,
                'price' =>         "31000",
                'status' =>        "Available",
                'type' =>          "For Rent",
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // 4
            [
                "by_agent_id" => 1,
                'title' =>         "Apartment ",
                'description' =>   "135 sq m, 3 bedrooms, 3 bathrooms, Super Lux finishing, Ready for delivery",
                'city' =>          "Cairo",
                'address' =>       "Capital East Compound, Nasr City",
                'latitude' =>      "30.063946765948728",
                'longitude' =>     "31.34454954054952",
                'beds' =>          "3",
                'baths' =>         "3",
                'area' =>          "135",
                'property_date' => $now,
                'price' =>         "31000",
                'status' =>        "Available",
                'type' =>          "For Sale",
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // 5
            [
                "by_agent_id" => 2,
                'title' =>         "Apartment ",
                'description' =>   "190 sq m, 3 rooms, 2 bathrooms, located on Al-Muqaddas Street, behind Abbas Al-Akkad",
                'city' =>          "Cairo",
                'address' =>       "Al-Muqaddas Street, International Modern, Nasr City",
                'latitude' =>      "30.064431",
                'longitude' =>     "31.344383",
                'beds' =>          "3",
                'baths' =>         "2",
                'area' =>          "190",
                'property_date' => $now,
                'price' =>         "50300",
                'status' =>        "Available",
                'type' =>          "For Rent",
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // 6
            [
                "by_agent_id" => 3,
                'title' =>         "Apartment ",
                'description' =>   "220 sq m, 4 bedrooms, 3 bathrooms, Super Lux finishing, first use",
                'city' =>          "Cairo",
                'address' =>       "Hisham Lib Street, 8th District, Nasr City",
                'latitude' =>      "30.064459205476133",
                'longitude' =>     "31.343529630596812",
                'beds' =>          "4",
                'baths' =>         "3",
                'area' =>          "220",
                'property_date' => $now,
                'price' =>         "7000000",
                'status' =>        "Available",
                'type' =>          "For Sale",
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // 7
            [
                "by_agent_id" => 1,
                'title' =>         "Apartment ",
                'description' =>   "230 sq m, 3 rooms, 2 bathrooms, 2 reception areas, located in the Sixth District",
                'city' =>          "Cairo",
                'address' =>       "Hosni Ahmed Street, Sixth District, Nasr City",
                'latitude' =>      "30.06441742115195",
                'longitude' =>     "31.343060244030806",
                'beds' =>          "3",
                'baths' =>         "2",
                'area' =>          "230",
                'property_date' => $now,
                'price' =>         "37000",
                'status' =>        "Available",
                'type' =>          "For Sale",
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // 8
            [
                "by_agent_id" => 2,
                'title' =>         "Apartment ",
                'description' =>   "200 sq m, 3 rooms, 2 bathrooms, overlooking a spacious garden, fully finished",
                'city' =>          "Cairo",
                'address' =>       "Lawazim Street, Sixth District, Nasr City",
                'latitude' =>      "30.062172773202768",
                'longitude' =>     "31.344245654210635",
                'beds' =>          "3",
                'baths' =>         "2",
                'area' =>          "200",
                'property_date' => $now,
                'price' =>         "6800000",
                'status' =>        "Available",
                'type' =>          "For Sale",
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // 9
            [
                "by_agent_id" => 3,
                'title' =>         "Semi-furnished apartment ",
                'description' =>   "230 sq m, semi-furnished, 3 bedrooms, 2 bathrooms, 4-piece reception",
                'city' =>          "Cairo",
                'address' =>       "Moussa Ibn Nasser Street, International Modern, Nasr City",
                'latitude' =>      "30.06174331891713",
                'longitude' =>     "31.34336151393381",
                'beds' =>          "3",
                'baths' =>         "2",
                'area' =>          "230",
                'property_date' => $now,
                'price' =>         "500000",
                'status' =>        "Available",
                'type' =>          "For Sale",
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // 10
            [
                "by_agent_id" => 1,
                'title' =>         "Apartment ",
                'description' =>   "185 sq m, 3 bedrooms, including master with bathroom, 3 reception areas, large kitchen",
                'city' =>          "Cairo",
                'address' =>       "Abbas Al-Akkad Street, First District, Nasr City",
                'latitude' =>      "30.060275351995884",
                'longitude' =>     "31.344895226665713",
                'beds' =>          "3",
                'baths' =>         "3",
                'area' =>          "185",
                'property_date' => $now,
                'price' =>         "800000",
                'status' =>        "Available",
                'type' =>          "For Sale",
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // 11
            [
                "by_agent_id" => 2,
                'title' =>         "Apartment ",
                'description' =>   "130 sq m, 2 bedrooms, 2 bathrooms, reception, ready for occupancy",
                'city' =>          "Cairo",
                'address' =>       "Dajla Al-Indimaj, Komplex Landmark, Nasr City",
                'latitude' =>      "30.05939352817551",
                'longitude' =>     "31.3457758392324",
                'beds' =>          "2",
                'baths' =>         "2",
                'area' =>          "130",
                'property_date' => $now,
                'price' =>         "52750",
                'status' =>        "Available",
                'type' =>          "For Sale",
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
