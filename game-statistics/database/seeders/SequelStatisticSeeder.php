<?php

namespace Database\Seeders;

use App\Models\Statistics;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class SequelStatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create("hr_HR");
        Statistics::updateOrCreate([
             'game_progress'=>$faker->randomDigit().$faker->randomDigit().".".$faker->randomDigit().$faker->randomDigit()."%",
             'hours_played'=>$faker->randomDigit().$faker->randomDigit().$faker->randomDigit(),
             'started_playing'=>$faker->date("Y-m-d"),
             'ended_playing'=>$faker->date("Y-m-d"),
             'sequel_id'=>$faker->randomElement(['1','3']),
        ]);
    }
}
