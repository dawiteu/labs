<?php

namespace App\Http\Controllers;

use App\Mail\Newsletter as MailNewsletter;
use App\Models\Article;
use App\Models\Article_tag;
use App\Models\Categorie;
use App\Models\Comment;
use App\Models\Newsletter;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use stdClass;

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
        $cats = Categorie::where('deleted', 0)->get(); 
        $tags = Tag::where('deleted', 0)->get();  
        return view('admin.blog.create', compact('cats', 'tags'));
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

            $request->validate([
                "titre"         => "required",
                "cat"           => "required", 
                "description"   => "required"
            ]);
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
            return redirect()->route('admin.blog.index')->with('error', 'Permissions refus??e'); 
        }
    }

    public function store(Request $request){ 

        $request->validate([
            "titre"         => "required",
            "cat"           => "required", 
            "description"   => "required",
            "newimg"        => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        ]);

        $article = new Article(); 

        $article->titre             = $request->titre; 
        $article->description       = $request->description;  
        $article->user_id           = Auth::user()->id;  
        $article->categorie_id      = $request->cat; 

        if($request->file('newimg') != NULL){
            $request->file('newimg')->storePublicly('img/post/','public');
            $article->image = "img/post/". $request->file('newimg')->hashName();
        }
        
        $article->deleted = 0; 
        $article->valide = 0; // jamais trop s??r. 
        $article->save(); 

        if($request->input('taglist') != NULL){
            foreach ($request->input('taglist') as $value) {
                $tag = new Article_tag(); 
                $tag->article_id = $article->id; 
                $tag->tag_id     = $value; 
                $tag->save();
            }
        }

        return redirect()->route('admin.blog.index')->with('success', 'Article bien ajout??. Il attends la confirmation.'); 
    }

    public function destroy(Article $article){
        if($article->user_id == Auth::user()->id ||  Auth::user()->role_id < 3){
            $article->deleted = 1; 
            $article->save(); 
            return redirect()->route('admin.blog.index')->with('success', 'article bien supprim??'); 
        }else{
            return redirect()->route('admin.blog.index')->with('error', 'Permissions refus??e'); 
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

            $emails = Newsletter::where('subscribe', 1)->get(); 

            if(count($emails) > 0) { // il y au moins un 
                foreach ($emails as $usmail) {
                    Mail::to($usmail)->send(new MailNewsletter());
                }
            }
            return redirect()->back()->with('success', "L'article a bien ??t?? accept?? ");
        }else{
            return redirect()->back()->with('error', "Cette op??ration n'est plus disponible");
        } 
    }

    public function refuseArticle( Article $article){
        if(($article->deleted) == 0 && ($article->valide == 0)){
            $article->deleted = 1; 
            $article->save(); 
            return redirect()->back()->with('error', "L'article a bien ??t?? refus?? ");
        }else{
            return redirect()->back()->with('error', "Cette op??ration n'est plus disponible");
        } 
    }

    public function valideCom(Comment $comment){
        if($comment->deleted == 0 && $comment->valide == 0){ 
            $comment->valide = 1; 
            $comment->save(); 
            return redirect()->back()->with('success', "Le com a bien ??t?? ajouter! ");
        }else{
            return redirect()->back()->with('error', "Cette op??ration n'est plus disponible");
        }
    }
    
    public function refuseCom(Comment $comment){
        if($comment->deleted == 0 && $comment->valide == 0){ 
            $comment->deleted = 1; 
            $comment->save(); 
            return redirect()->back()->with('error', "Le com a bien ??t?? supprim??! ");
        }else{
            return redirect()->back()->with('error', "Cette op??ration n'est plus disponible");
        }
    }

    

}

