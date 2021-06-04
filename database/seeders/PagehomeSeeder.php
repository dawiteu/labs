<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class PagehomeSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        DB::table('pagehomes')->insert([
            "t1"         => "GET IN (THE LAB) AND DISCOVER MOLENGEEK", 
            "desc1"      => $faker->text(400), 
            "desc2"      => $faker->text(400), 
            "btn1text"   => "browse", 
            "btn1link"   => "#testimontials", 
            "imglink"    => "img/video.jpg", 
            "videolink"  => "https://www.youtube.com/watch?v=JgHfx2v9zOU", 
            "t2"         => "", 
            "t3"         => "", 
            "btn2text"   => "browse", 
            "btn2link"   => "", 
            "t4"         => "", 
            "t5"         => "", 
            "desc3"      => "", 
            "btn3text"   => "browse", 
            "btn3link"   => "", 
            "created_at" => now(), 

        ]);
    }
}
