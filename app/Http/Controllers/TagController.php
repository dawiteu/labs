<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        //pour le menu 
        $arts = Article::where('deleted', 0)->paginate(4); 
        $artovali = Article::where('deleted', 0)->where('valide', 0)->get(); 
        $tovalide = Comment::where('deleted', 0)->where('valide', 0)->get();
        $coms = Comment::where('deleted', 0)->get();
        // les cats : 
        $tags = Tag::where('deleted', 0)->paginate(10); //:paginate(15); 
        return view('admin.blog.tag.index', compact('arts', 'coms','tovalide', 'artovali', 'tags'));
    }


    public function store(Request $request){
        $request->validate([  "tagname" => "required" ]); 

        $tag = new Tag(); 

        $tag->nom       = $request->tagname; 
        $tag->deleted   = 0; // jamais trop sûr; 

        $tag->save(); 

        return redirect()->route('tag.index')->with('success', 'tag  bien ajoutée');
    }

    public function edit(Tag $tag){
        //pour le menu 
        $arts = Article::where('deleted', 0)->paginate(4); 
        $artovali = Article::where('deleted', 0)->where('valide', 0)->get(); 
        $tovalide = Comment::where('deleted', 0)->where('valide', 0)->get();
        $coms = Comment::where('deleted', 0)->get();
        // les cats : 
        $tags = Tag::where('deleted', 0)->paginate(10); 
        return view('admin.blog.tag.edit', compact('tag', 'arts', 'coms','tovalide', 'artovali', 'tags'));
    }

    public function update(Request $request, Tag $tag){
        $request->validate([  "newtagname" => "required" ]); 

        $tag->nom = $request->newtagname; 
        $tag->save(); 
        return redirect()->route('tag.index')->with('success', 'tag bien modifée');
    }

    public function destroy(Tag $tag){
        $tag->deleted = 1; 
        $tag->save(); 
        return redirect()->route('tag.index')->with('success', 'tag bien suprrimée');
    }
}
