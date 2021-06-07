<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [ "nom" => "société",           "created_at" => now() ],
            [ "nom" => "web développement", "created_at" => now() ],
            [ "nom" => "sciences ",         "created_at" => now() ],
        ]);
    }
}
