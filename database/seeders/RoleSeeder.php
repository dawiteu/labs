<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ["nom" => "Administrateur", "created_at" => now()], 
            ["nom" => "Web Master",     "created_at" => now()], 
            ["nom" => "Rédacteur",      "created_at" => now()], 
            ["nom" => "Membre",         "created_at" => now()], 
        ]);
    }
}
