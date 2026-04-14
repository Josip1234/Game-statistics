<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $faker=Faker::create("hr_HR");
        User::factory()->create([
            'name' =>  'Josip Bošnjak',
            'email' => 'jbosnjak@mail.com',
            'dbirth'=> '1992-11-05',
            'nickname'=> 'jobo',
            'password'=> '12345678'
        ]);
    }
}
