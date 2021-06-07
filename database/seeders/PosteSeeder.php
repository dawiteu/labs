<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('postes')->insert([
            ["nom" =>    "Webmaster",           "created_at" => now() ], // 1
            ["nom" =>    "CEO",                 "created_at" => now() ], // 2
            ["nom"  =>   "Junior developer",    "created_at" => now() ], // 3
            ["nom"  =>   "Senior developer",    "created_at" => now() ], // 4 
            ["nom"  =>   "Project Manager",     "created_at" => now() ], // 5 
            ["nom"  =>   "Digital Designer",    "created_at" => now() ]  // 6
        ]); 
    }
}
