<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UpdateUsersSeeder extends Seeder
{
    /** 
     * Run the database seeds.
     */
    public function run(): void
    {
         User::where('id',1)->update([
                            'userType'=>1,
                ]);
          User::where('id',5)->update([
                            'userType'=>rand(0,1),
                ]);
    }
}
