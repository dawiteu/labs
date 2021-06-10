<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::where('deleted', 0)->get();
        return view('admin.user.roles.index', compact('roles')); 
    }
    
    public function edit(Role $role){
        $roles = Role::where('deleted', 0)->get();
        return view('admin.user.roles.edit', compact('roles', 'role')); 
    }

    public function store(Request $request){
        $request->validate([  "rolename" => "required" ]); 
        $role = new Role(); 
        $role->nom       = $request->rolename; 
        $role->deleted   = 0; // jamais trop sûr; 
        $role->save(); 

        return redirect()->route('role.index')->with('success', 'role bien ajouté');
    }

    public function update(Request $request, Role $role){
        $request->validate([  "rolename" => "required" ]); 

        $role->nom = $request->rolename; 
        $role->save(); 
        return redirect()->route('role.index')->with('success', 'role bien modifée');
    }

    public function destroy(Role $role){
        $role->deleted = 1; 
        $role->save(); 
        return redirect()->route('role.index')->with('success', 'role bien suprrimée');
    }
}
