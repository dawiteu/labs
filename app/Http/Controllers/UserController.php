<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\LoginMail;
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
        $users = User::paginate(15)->where('deleted', '0'); 

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
        $newuser->created_by = Auth::user()->id; 
        $pass = Str::random(8);
        $newuser->password = Hash::make($pass); 
        $newuser->login_token = Str::random(9);
        $newuser->def_pass = 1; 
        $newuser->save(); 
        Mail::to($newuser->email)->send(new WelcomeMail($newuser, $pass));
        return redirect()->route('dashboard')->with('success', 'User bien créer et mail envoyé.')->withErrors('error', 'Tout ne cest pas bien passé'); 
    }

    public function show(User $user){ 
        if(Auth::user()->id ==  $user->id || Auth::user()->role_id <= 2){
            return view('admin.user.show', compact('user')); 
        }else{
            return redirect()->route('dashboard')->with('error','Access refusé'); 
        }
    }

    public function actlist(){
        //user to activate
        $ustoacts = User::all()->where('active', '0')->where('deleted', '0'); 
        return view('admin.user.toactivate', compact('ustoacts'));
    }

    public function actuser(User $user, $proced){

        $this->authorize('isWebMaster', Auth::user()); 

        if($proced == "act" || $proced == "ref"){
            $do = ( $proced == "act" ? '1' : '0');  
            $user->active = $do; 
            if($do == 1){ 
                Mail::to($user->email)->send(new LoginMail($user));
                $user->save();
                return redirect()->route('user.act')->with('success', 'User activé');
            }else if($do == 0){
                $user->deleted = 1;
                $user->save();
                return redirect()->route('user.act')->with('error', 'User deactivé et bloqué.');
            }
        }else{
            return redirect()->route('user.act')->with('error','Opération non reconnue.');
        }
        
    }

    public function edit(User $user){ 
        if(Auth::user()->id ==  $user->id  || Auth::user()->role_id <= 2){
            $roles  = Role::all(); 
            $postes = Poste::all(); 
            return view('admin.user.edit', compact('user', 'roles', 'postes')); 
        }else{
            return redirect()->route('dashboard')->with('error','Access refusé'); 
        }  
    }

    public function update(Request $request, User $user){ 
        //$this->authorize('adminoruser', Auth::user()); 
        $request->validate([
            "nom"       => "required", 
            "prenom"    => "required", 
            "email"     => "required"
        ]);

        $user->nom      = $request->nom; 
        $user->prenom   = $request->prenom; 
        $user->email    = $request->email; 

        if($request->has('role')){
            //dd($user->role_id, $request->role); 
            $user->role_id = $request->role; 
        }
        if($request->has('poste')){
            //dd($user->poste, $request->poste); 
            $user->poste_id = $request->role;
        }  

        if($request->file('newimage') != NULL){
            $request->file('newimage')->storePublicly('img/team/','public');
            $user->image = "img/team/". $request->file('newimage')->hashName();
        }

        if(!empty($request->input('description'))){
            $user->description = $request->description; 
        }

        $user->save();

        return redirect()->route('dashboard')->with('success', 'Modifications bien enregistrées'); 
    }


}
