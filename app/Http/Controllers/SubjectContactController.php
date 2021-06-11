<?php

namespace App\Http\Controllers;

use App\Models\SubjectContact;
use Illuminate\Http\Request;

class SubjectContactController extends Controller
{
    public function index(){
        $sujs = SubjectContact::where('deleted', 0)->get();
        return view('admin.cont.index', compact('sujs')); 
    }

    public function edit(SubjectContact $sujet){
        $sujs = SubjectContact::where('deleted', 0)->get();
        return view('admin.cont.edit', compact('sujs','sujet')); 
    }

    
    public function store(Request $request){
        $request->validate([ "sujtitre" => "required" ]); 

        $suj = new SubjectContact(); 
        $suj->nom = $request->sujtitre; 
        $suj->deleted = 0; 
        $suj->save(); 
        return redirect()->route('subject.index')->with('success','Sujet bien ajouté'); 
    }



    public function update(Request $request, SubjectContact $sujet){
        $request->validate([ "sujtitre" => "required" ]); 

        $sujet->nom = $request->sujtitre; 
        $sujet->deleted = 0; 
        $sujet->save(); 
        return redirect()->route('subject.index')->with('success','Sujet bien modifié'); 
    }

    public function destroy(SubjectContact $sujet){
        $sujet->deleted = 1; 
    }
}
