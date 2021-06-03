<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagehomecarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagehomecarousels')->insert([
            [               // 
                "image"         => "img/homecarousel/01.jpg", 
                "description"   => "Get your freebie template now! 1",
                "priority"      => 1,
                "created_at"    => now()
            ],
            [
                "image"         => "img/homecarousel/02.jpg", 
                "description"   => "Get your freebie template now! 2",
                "priority"      => 0,
                "created_at"    => now()
            ]
        ]);
    }
}
