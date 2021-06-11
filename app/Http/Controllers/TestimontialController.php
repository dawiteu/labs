<?php

namespace App\Http\Controllers;

use App\Models\Testimontial;
use Illuminate\Http\Request;

class TestimontialController extends Controller
{
    public function index(){
        $tests = Testimontial::where('disabled',0)->paginate(10); 
        return view('admin.testimontial.index', compact('tests')); 
    }

    public function create(){
        return view('admin.testimontial.create'); 
    }

    public function store(Request $request){
        $request->validate([  
            "author" => "required",
            "authimg" => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],  
            "description" => "required", 
            "poste" => "required"
        ]); 

        $test = new Testimontial(); 

        $test->author       = $request->author; 
        //$test->authimg      = $request->author_image;
        if($request->file('authimg') != NULL){
            $request->file('authimg')->storePublicly('img/testimontials/','public');
            $test->author_image = "img/testimontials/". $request->file('authimg')->hashName();
        } 
        $test->description  = $request->description; 
        $test->poste        = $request->poste; 

        $test->save(); 

        return redirect()->route('testimontial.all')->with('success', 'testimonial  bien ajoutée');
    }


    public function edit(Testimontial $testimontial){
        return view('admin.testimontial.edit', compact('testimontial'));
    }

    public function update(Request $request, Testimontial $testimontial){

        $request->validate([  
            "author" => "required",
            //"authimg" => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],  
            "description" => "required", 
            "poste" => "required"
        ]); 

        $testimontial->author   = $request->author; 
        //$test->authimg      = $request->author_image;
        if($request->file('authimg') != NULL){
            $request->file('authimg')->storePublicly('img/testimontials/','public');
            $testimontial->author_image = "img/testimontials/". $request->file('authimg')->hashName();
        } 
        $testimontial->description  = $request->description; 
        $testimontial->poste        = $request->poste; 

        $testimontial->save(); 

        return redirect()->route('testimontial.all')->with('success', 'testimonial  bien modifié');
    }

    public function destroy(Testimontial $testimontial){
        $testimontial->disabled = 1; 
        $testimontial->save(); 

        return redirect()->route('testimontial.all')->with('success', 'testimontial bien supprimé'); 
    }

}
