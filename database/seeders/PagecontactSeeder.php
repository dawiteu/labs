<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagecontactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagecontacts')->insert([
            "t1"        => "Contact us", 
            "desc1"     => "Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum.",
            "t2"        => "Main Office",
            "adresse"   => "C/ Libertad, 34 <br> 05200 Arévalo ",
            "tel"       => "0034 37483 2445 322",
            "email"     => "hello@company.com",
            "created_at"=> now()

        ]);
    }
}
