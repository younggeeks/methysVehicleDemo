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
            "TESLA MOTORS INCORPORATED",
            "ASTON MARTIN LAGONDA LIMITED",
            "BMW OF NORTH AMERICA, LLC",
            "JAGUAR LAND ROVER NORTH AMERICA, LLC",
            "MASERATI NORTH AMERICA, INC.",
            "ROLLS ROYCE MOTOR CARS",
            "TOYOTA MOTOR NORTH AMERICA, INC",
            "BUGATTI AUTOMOBILES S.A.S",
            "MOONLIGHT AUTO",
        ];






        //generating fake 10 users
        foreach (range(1, count($owners)) as $index) {
            DB::table("vehicles")->insert([
                "manufacturer"=>$manufacturers[array_rand($manufacturers)],
                "color"=>substr($faker->safeHexColor,1),
                "millage"=>$faker->numberBetween(900,8383939)." Km",
                "year"=>$faker->year,
                "type"=>$faker->streetName,
                "owner_id"=>$faker->randomElement($owners),
                "created_at"=>$faker->dateTime,
                "updated_at"=>$faker->dateTime
            ]);
        }
    }
}
