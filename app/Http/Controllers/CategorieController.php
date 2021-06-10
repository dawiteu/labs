<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Comment;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(){
        //pour le menu 
        $arts = Article::where('deleted', 0)->paginate(4); 
        $artovali = Article::where('deleted', 0)->where('valide', 0)->get(); 
        $tovalide = Comment::where('deleted', 0)->where('valide', 0)->get();
        $coms = Comment::where('deleted', 0)->get();

        // les cats : 
        $cats = Categorie::where('deleted', 0)->get(); //:paginate(15); 
        return view('admin.blog.cat.index', compact('arts', 'coms','tovalide', 'artovali', 'cats'));
    }

    // BLOG cats 
    public function store(Request $request){
        $request->validate([  "catname" => "required" ]); 

        $cat = new Categorie(); 

        $cat->nom       = $request->catname; 
        $cat->deleted   = 0; // jamais trop sûr; 

        $cat->save(); 

        return redirect()->route('categorie.index')->with('success', 'Catégorie bien ajoutée');
    }

    public function edit(Categorie $categorie){
        //pour le menu 
        $arts = Article::where('deleted', 0)->paginate(4); 
        $artovali = Article::where('deleted', 0)->where('valide', 0)->get(); 
        $tovalide = Comment::where('deleted', 0)->where('valide', 0)->get();
        $coms = Comment::where('deleted', 0)->get();
        // les cats : 
        $cats = Categorie::all(); //:paginate(15); 
        return view('admin.blog.cat.edit', compact('categorie', 'arts', 'coms','tovalide', 'artovali', 'cats'));
    }

    public function update(Request $request, Categorie $categorie){
        $request->validate([  "newcatname" => "required" ]); 

        $categorie->nom = $request->newcatname; 
        $categorie->save(); 
        return redirect()->route('categorie.index')->with('success', 'Catégorie bien modifée');
    }

    public function destroy(Categorie $categorie){
        $categorie->deleted = 1; 
        $categorie->save(); 
        return redirect()->route('categorie.index')->with('success', 'Catégorie bien suprrimée');
    }
}
