<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class RandomUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $faker=Faker::create("hr_HR");
         for ($i=0; $i < 10; $i++) { 
           
         
        User::factory()->create([
            'name' =>  $faker->firstName,
            'email' => $faker->email,
            "userType"=>$faker->randomElement([0,1]),
            'dbirth'=> $faker->date,
            'nickname'=> $faker->userName,
            'password'=> '12345678',
            'created_at'=>$faker->dateTime
        ]);
         }
    }
}
