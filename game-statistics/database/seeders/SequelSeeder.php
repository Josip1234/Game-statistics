<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sequel;
use Faker\Factory as Factory;

class SequelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factory=Factory::create("hr_HR");
        Sequel::updateOrCreate([
                'game_id'=>1,
                'name'=>$factory->userName,
                'game_version'=>'V.'.rand(1,3).".".rand(0,3).".".rand(0,5),
                'version_history'=>$factory->realText,
                'publish_year'=>$factory->year
        ]);
    }
}
