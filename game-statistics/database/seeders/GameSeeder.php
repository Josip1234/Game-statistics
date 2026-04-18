<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create("en_EN");
        $year=$faker->year."-".$faker->year;
        Game::updateOrCreate([
            "name"=>$faker->word,
            "yearOrRangeOfProduction"=>$year,
            "user_id"=>1
        ]);        
    }
}
