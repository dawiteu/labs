<?php

namespace Database\Seeders;

use App\Mail\AdminRegisterSender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email = "dawid@tararuj.be"; 
        $nom   = "Tararuj"; 
        $prenom = "Dawid";

        DB::table('users')->insert([
            [
                "nom"               => $nom,
                "prenom"            => $prenom,
                "email"             => $email, 
                "email_verified_at" => now(), 
                "password"          => Hash::make('admin1'), 
                "image"             => "img/def/noav2.png", 
                "description"       => "Le boss des boss's... le Président quoi.",
                "role_id"           => 1, // le super admin  
                "poste_id"          => 1,
                "active"            => 1, // l'admin est dirrectement activé
                "deleted"           => 0, 
                "created_by"        => 1, // le premier s'est fait lui meme. 
                "created_at"        => now(), 
            ], 

            // [
            //     "nom"               => "El",
            //     "prenom"            => "Ayoub",
            //     "email"             => "a@youb.com", 
            //     "email_verified_at" => now(), 
            //     "password"          => Hash::make('admin1'), 
            //     "image"             => "img/def/noav2.png", 
            //     "description"       => "Webmaster (Gestion du site)",
            //     "role_id"           => 2, // le webmaster  
            //     "poste_id"          => 1,
            //     "active"            => 1,
            //     "created_at"        => now(), 
            // ]
        ]);

        //Mail::send('mail.adminregister', (new AdminRegisterSender($email)));
    }
}
