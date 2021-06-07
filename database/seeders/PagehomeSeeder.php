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
            "t2"         => "WHAT OUR CLIENTS SAY", 
            "t3"         => "GET IN (THE LAB) AND SEE THE SERVICES", 
            "btn2text"   => "browse", 
            "btn2link"   => "#", // vers la route service ici donc {{ route('services.all') }} jps
            "t4"         => "GET IN THE (LAB AND) MEET THE TEAM", 
            "t5"         => "Are you ready to stand out?", 
            "desc3"      => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est.", 
            "btn3text"   => "browse", 
            "btn3link"   => "#contact", 
            "created_at" => now(), 

        ]);
    }
}
