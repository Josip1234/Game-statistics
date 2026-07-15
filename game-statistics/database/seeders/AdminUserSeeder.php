<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $faker=Faker::create("hr_HR");

        User::updateOrCreate([
            "name"=>$faker->firstName." ".$faker->lastName,
            "email"=>$faker->email,
            "userType"=>$faker->randomKey([0,1]),
            "dbirth"=>$faker->date("Y-m-d","2019-01-01"),
            "nickname"=>$faker->userName,
            "password"=>Hash::make('user1234'),
        ]); 
    }
}
