<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(){
        $role = Role::all(); 
        $post = Poste::all();
        return view('admin.user.create', compact('role', 'post')); 
    }
}
