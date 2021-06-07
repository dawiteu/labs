<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subject_contacts')->insert([
            [ "nom" => "Demande d'informations ", "created_at" => now()], 
            [ "nom" => "Préparation devis ", "created_at" => now()], 
            [ "nom" => "Jobs (stage, emploi, b2b) ", "created_at" => now()] 
        ]);
    }
}
