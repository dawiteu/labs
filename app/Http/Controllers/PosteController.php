<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    public function index(){ 
        $postes = Poste::where('deleted', 0)->get(); 
        return view('admin.user.postes.index', compact('postes')); 
    }

    public function edit(Poste $poste){
        $postes = Poste::where('deleted', 0)->get(); 
        return view('admin.user.postes.edit', compact('postes', 'poste')); 
    }

    public function store(Request $request){
        $request->validate([ "postename" => "required" ]); 

        $poste = new Poste(); 
        $poste->nom = $request->postename; 
        $poste->deleted = 0; 
        $poste->save(); 

        return redirect()->route('postes.index')->with('Poste bien ajouté'); 
    }

    public function update(Request $request, Poste $poste){
        $request->validate([ "postename" => "required" ]); 

        $poste->nom = $request->postename;
        $poste->save(); 

        return redirect()->route('postes.index')->with('Poste bien actualisé'); 
    }

    public function destroy(Poste $poste){
        $poste->deleted = 1; 
        $poste->save();
        return redirect()->route('postes.index')->with('success', 'poste bien suprrimée');
    }
}
