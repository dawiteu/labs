<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\WelcomeMail;
use App\Models\Poste;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create(){
        $roles = Role::all(); 
        $postes = Poste::all();
        return view('admin.user.create', compact('roles', 'postes')); 
    }

    public function store(UserRequest $request){
        $newuser = new User(); 

        // ce qui viens de l'admin 
        $newuser->nom = $request->nom; 
        $newuser->prenom = $request->prenom; 
        $newuser->email = $request->email; 
        $newuser->role_id = $request->role; 
        $newuser->poste_id = $request->poste;
        
        // ce que nous imposons: 

        $newuser->description = ""; 
        $newuser->active = 0; 
        $pass = Str::random(8);
        $newuser->password = Hash::make($pass); 

        //dd($newuser, $pass); 
        $newuser->save(); 
        Mail::to($newuser->email)->send(new WelcomeMail($newuser, $pass));
            
        return redirect()->route('dashboard')->with('success', 'User bien créer et mail envoyé.')->withErrors('error', 'Tout ne cest pas bien passé'); 

            // return redirect()->route('dashboard')->with('error', 'Tout ne cest pas bien passé'); 
        
        
    }
}
