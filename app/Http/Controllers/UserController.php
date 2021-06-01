<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\WelcomeMail;
use App\Models\Poste;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index(){ 
        $users = User::paginate(15); 

        return view('admin.user.index', compact('users')); 
    }

    public function create(){
        $this->authorize('isAdmin', Auth::user()); 
        $roles = Role::all(); 
        $postes = Poste::all();
        return view('admin.user.create', compact('roles', 'postes')); 
    }

    public function store(UserRequest $request){
        $this->authorize('isAdmin', Auth::user()); 
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
        $newuser->deleted = 0; 
        $pass = Str::random(8);
        $newuser->password = Hash::make($pass); 

        $newuser->save(); 
        Mail::to($newuser->email)->send(new WelcomeMail($newuser, $pass));
        return redirect()->route('dashboard')->with('success', 'User bien créer et mail envoyé.')->withErrors('error', 'Tout ne cest pas bien passé'); 
    }

    public function show(User $user){ 
        return view('admin.user.show', compact('user')); 
    }
}
