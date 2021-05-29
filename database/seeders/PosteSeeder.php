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
            ["nom" =>    "Webmaster",      "created_at" => now() ], 
            ["nom" =>    "CEO",            "created_at" => now() ], 
            ["nom"  =>   "Junior",         "created_at" => now() ],
            ["nom"  =>   "Senior",         "created_at" => now() ]
        ]); 
    }
}
