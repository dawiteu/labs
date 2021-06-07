<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageservicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pageservices')->insert([
            "t1" => "GET (IN TH)E LAB AND SEE THE SERVICES",
            "btn1text" => "browse", 
            "btn1link" => "#services", 
            "t2"    => "GET IN THE L(AB AND DIS)COVER THE WORLD", 
            "btn2text" => "browse", 
            "btn2link" => "#services"
        ]);
    }
}
