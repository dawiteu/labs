<?php

namespace Database\Seeders;

use App\Mail\AdminRegisterSender;
use App\Mail\LoginMail;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use stdClass;

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
        $login_token = Str::random(9);

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
                "login_token"       => $login_token,
                "def_pass"          => 1,
                "created_at"        => now(), 
            ], 
        ]);
        
        $data = new stdClass; 
        $data->email = $email; 
        $data->token = $login_token;

        Mail::to($email)->send(new AdminRegisterSender($data));
    }
}
