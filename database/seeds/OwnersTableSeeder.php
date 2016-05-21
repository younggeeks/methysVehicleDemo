<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
class OwnersTableSeeder extends Seeder
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

        //generating fake 10 users
        foreach (range(1, 9) as $index) {
            DB::table("owners")->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'contact_number' => $faker->phoneNumber,
                'email' => $faker->email,
            ]);
        }

    }
}
