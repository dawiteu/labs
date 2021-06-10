<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Article_tag;
use App\Models\Categorie;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller // Backend 
{
    public function index(){
        $arts = Article::where('deleted', 0)->paginate(4); 
        $artovali = Article::where('deleted', 0)->where('valide', 0)->get(); 
        $tovalide = Comment::where('deleted', 0)->where('valide', 0)->get();
        $coms = Comment::where('deleted', 0)->get();
        return view('admin.blog.index', compact('arts', 'coms','tovalide', 'artovali'));
    }

    public function create(){
        
        return view();
    }

    public function show(Article $article){
        return view('admin.blog.show', compact('article')); 
    }

    public function edit(Article $article){

        $cats = Categorie::all(); 
        $tags = Tag::all(); 
        return view('admin.blog.edit', compact('article', 'cats', 'tags'));
    }

    public function update(Request $request, Article $article){

        if($article->user_id == Auth::user()->id ||  Auth::user()->role_id < 3){

            //dd($article); 
            
            if($request->file('newimg') != NULL){
                $request->file('newimg')->storePublicly('img/post/','public');
                $article->image = "img/post/". $request->file('newimg')->hashName();
            }
            
            $article->titre         = $request->titre; 
            $article->description   = $request->description;
            $article->categorie_id  = $request->cat; 
            
            DB::table('article_tag')->where('article_id', $article->id)->delete(); 
            
            if($request->input('taglist') != NULL){
                foreach ($request->input('taglist') as $value) {
                    $tag = new Article_tag(); 
                    $tag->article_id = $article->id; 
                    $tag->tag_id     = $value; 
                    $tag->save();
                }
            }
            
            $article->save();
            
            return redirect()->route('admin.blog.index')->with('success', 'Article bien modif'); 
        }else{   
            return redirect()->route('admin.blog.index')->with('error', 'Permissions refusée'); 
        }
    }

    public function destroy(Article $article){
        if($article->user_id == Auth::user()->id ||  Auth::user()->role_id < 3){
            $article->deleted = 1; 
            $article->save(); 
            return redirect()->route('admin.blog.index')->with('success', 'article bien supprimé'); 
        }else{
            return redirect()->route('admin.blog.index')->with('error', 'Permissions refusée'); 
        }
    }

    public function valide($valide){
        if(Auth::user()->role_id < 3){
            switch ($valide) {
                case 'articles':
                    $arts = Article::where('deleted', 0)->where('valide', 0)->get();
                    return view('admin.blog.valide', compact('valide', 'arts')); 
                    break;
                case 'coms':
                    $coms = Comment::where('deleted', 0)->where('valide', 0)->get();
                    return view('admin.blog.valide', compact('valide','coms')); 
                    break;
                default:
                    return redirect()->back()->with('error', 'Page introuvable'); 
                    break;
            }
        }else{
            return redirect()->route('admin.blog.index')->with('error', 'access refused'); 
        } 
    }

    public function valideArticle(Article $article){
        if(($article->deleted) == 0 && ($article->valide == 0)){
            $article->valide = 1; 
            $article->save(); 
            return redirect()->back()->with('success', "L'article a bien été accepté ");
        }else{
            return redirect()->back()->with('error', "Cette opération n'est plus disponible");
        } 
    }

    public function refuseArticle( Article $article){
        if(($article->deleted) == 0 && ($article->valide == 0)){
            $article->deleted = 1; 
            $article->save(); 
            return redirect()->back()->with('error', "L'article a bien été refusé ");
        }else{
            return redirect()->back()->with('error', "Cette opération n'est plus disponible");
        } 
    }

    public function valideCom(Comment $comment){
        if($comment->deleted == 0 && $comment->valide == 0){ 
            $comment->valide = 1; 
            $comment->save(); 
            return redirect()->back()->with('success', "Le com a bien été ajouter! ");
        }else{
            return redirect()->back()->with('error', "Cette opération n'est plus disponible");
        }
    }
    
    public function refuseCom(Comment $comment){
        if($comment->deleted == 0 && $comment->valide == 0){ 
            $comment->deleted = 1; 
            $comment->save(); 
            return redirect()->back()->with('error', "Le com a bien été supprimé! ");
        }else{
            return redirect()->back()->with('error', "Cette opération n'est plus disponible");
        }
    }
}

