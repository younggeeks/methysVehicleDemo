<?php

use App\Owner;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //creating faker Object
        $faker=Faker::create();

        //getting owners ids then attaching them to random generated vehicles
        $owners= Owner::lists("id")->all();


        $manufacturers=[
            "Aston Martin",
            "Land Rover",
            "Rolls Royce",
            "Mercedes-Benz",
            "Mazda",
            "Honda",
            "Dodge",
            "Nissan",
            "Mitsubishi",
            "Volkswagen",
            "Jeep",
            "Volvo"
        ];

        $types=[
            "CR-V",
            "Odyssey",
            "SCION xA",
            "Corolla",
            "FJ Cruiser",
            "Avalon",
            "Venza",
            "Paseo",
            "New Beetle",
            "Passat",
            "New GTI",
            "Tiguan"
        ];






        //generating fake 10 users
        foreach (range(1, count($owners)) as $index) {
            DB::table("vehicles")->insert([
                "manufacturer"=>$manufacturers[array_rand($manufacturers)],
                "color"=>substr($faker->safeHexColor,1),
                "millage"=>$faker->numberBetween(900,8383939)." Km",
                "year"=>$faker->year,
                "type"=>$types[array_rand($types)],
                "owner_id"=>$faker->randomElement($owners),
                "created_at"=>$faker->dateTime,
                "updated_at"=>$faker->dateTime
            ]);
        }
    }
}
