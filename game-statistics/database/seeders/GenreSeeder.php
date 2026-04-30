<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker=Faker::create("hr_HR");
        Genre::updateOrCreate([
            "name"=>$faker->name,
        ]);
         Genre::updateOrCreate([
            "name"=>$faker->name,
        ]);
         Genre::updateOrCreate([
            "name"=>$faker->name,
        ]);
         Genre::updateOrCreate([
            "name"=>$faker->name,
        ]);
         Genre::updateOrCreate([
            "name"=>$faker->name,
        ]);
    }
}
