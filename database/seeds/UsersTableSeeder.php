<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
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
            DB::table("users")->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                "api_token"=>str_random(60)
            ]);
        }

    }
}
