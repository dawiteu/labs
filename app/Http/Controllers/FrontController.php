<?php

namespace App\Http\Controllers;

use App\Mail\ContactSender;
use App\Mail\NewsBienvSender;
use App\Models\Article;
use App\Models\Categorie;
use App\Models\Comment;
use App\Models\Newsletter;
use App\Models\Pagecontact;
use App\Models\Pagehome;
use App\Models\Pagehomecarousel;
use App\Models\Pageservices;
use App\Models\Services;
use App\Models\SubjectContact;
use App\Models\Tag;
use App\Models\Testimontial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontController extends Controller
{
    public function footer(){ 
        $footinfo = Pagecontact::all()->first(); 
        $subjects = SubjectContact::all(); 
        return view('components.front.footer', compact('footinfo', 'subjects')); 
    }



    //FRONT page HOME: 

    public function index(){
        $errors = []; 
        $logo       = asset("img/big-logo.png"); 
        $carous     = Pagehomecarousel::all(); // caruosel 
        $rservices  = count(Services::all()) > 0 ? [ Services::all()->random(3) , Services::all()->random(9) ] : array_push($errors, 'services');
        $homeinfo   = count(Pagehome::all()) > 0 ? Pagehome::all()->first() : array_push($errors, 'Contenu page home'); // titres et informations generales 
        $testims    = count(Testimontial::all()) > 0 ? Testimontial::orderBy('id', 'desc')->take(6)->get() : array_push($errors, 'Testimontials clients'); 
        
        $teamceo    = User::where('poste_id', '2')->latest()->first() == null ? 'noceo' : User::where('poste_id', '2')->latest()->first(); 
        $teamgro    = count(User::all()->where('active', 1)) >= 2 ? User::all()->where('active', 1)->random(2) : User::all()->where('active', 1); 

        $footer = $this->footer();
        
        if(empty($errors)){
            return view('home', compact('logo', 'carous', 'rservices', 'homeinfo', 'testims','teamgro', 'teamceo', 'footer')); 
        }else{
            die('Erreur DB : <br/> + ' . implode(' <br/> + ', $errors) . " <br/>try: <br/> <code> php artisan migrate:fresh <b>--seed</b> </code> "); 
        }
        
    }

    // FRONT PAGE SERVICES 
    public function services(){
        $servinfo = Pageservices::all()->first(); 
        $servs    = Services::orderBy('id', 'desc')->paginate(9);
        $serv2    = Services::orderBy('id', 'desc')->take(6)->get(); 
        
        $posts    = Article::all()->where('deleted', 0)->random(3); 
        $footer = $this->footer();
        return view('services', compact('servinfo', 'servs', 'serv2', 'posts', 'footer')); 
    }


    // FRONT PAGE CONTACT
    public function contact(){ 
        $inf = Pagecontact::first(); 
        $footer = $this->footer();
        return view('contact', compact('footer', 'inf')); 
    }

    // front page contact SENDING FORM 

    public function submitcontact(Request $request){ 

        if($request->has('submitcontactform')){ 

            $request->validate([
                "name"      => "required", 
                "email"     => "required", 
                "subject"   => "required",
                "message"   => "required"
            ]);
    
            Mail::to("admin@labs-studio.com")->send(new ContactSender($request)); 
            return redirect()->route('front.index')->with('success', 'E mail bien envoyé');
        }
    }

    // front page BLOG 
    public function blog(){ 
        $arts = Article::orderBy('id','desc')->where('deleted', 0)->where('valide', 1)->paginate(3); 
        $cats = Categorie::all()->random(count(Categorie::all()));
        $tags = Tag::all(); 
        $footer = $this->footer(); 
        return view('blog', compact('arts','cats','tags','footer')); 
    }

    // front recherche BLOG ( par CAT TITLE)
    public function search(Request $request){ 
        if($request->has('q')){
            $q = $request->q; 
            $route = "search"; 
            $cats  = Categorie::all();
            $tags = Tag::all(); 
            $footer = $this->footer();
            $results = Article::where('deleted', 0)->where('titre', 'LIKE', "%" . $q . "%")->get();
            return view('blogshow', compact('route', 'results', 'cats','tags', 'footer', 'q'));
        }
    }

    // FRONT BLOG SHOW Article 
    public function showart(Article $id){ 
        $route = "articles"; 
        $cats  = Categorie::all();
        $tags = Tag::all(); 
        $footer = $this->footer();
        return view('blogshow', compact('route', 'cats', 'tags', 'id', 'footer')); 
    }

    // FRONT BLOG SHOW CAT(S) par titre 
    public function showcats($categorie){
        $route = "categories"; 
        $cats  = Categorie::all();
        $tags = Tag::all(); 
        $categ = Categorie::where('nom', 'LIKE', "%" . $categorie . "%")->get(); 
        $footer = $this->footer();
        return view('blogshow', compact('route', 'cats', 'tags', 'categ', 'categorie', 'footer')); 
    }

    // FRONT BLOG SHOW TAG(S) par nom 0/10 
    public function showtags($tag){
        $route   = "tags"; 
        $cats    = Categorie::all();
        $tags    = Tag::all(); 
        $results = Tag::where('nom', 'LIKE', "%" . $tag . "%")->get(); 
        $footer  = $this->footer();
        return view('blogshow', compact('route', 'cats', 'tag', 'tags', 'results', 'footer')); 
    }

    // FRONT BLOG AJOUT DE COMMANTAIRE 
    public function leavecomment(Request $request, Article $article){ 
        if($request->has('subaddcom')){

            $request->validate([
                "name" => "required|min:5", 
                "email"=> "required", 
                "message"=> "required"
            ]); 

            $com = new Comment(); 

            $com->auteur = $request->name; 
            $com->auteur_email = $request->email; 
            $com->message = $request->message; 
            $com->valide = 0; // par def ils ne sont pas validés. 
            $com->deleted = 0; // par def ils ne sont pas supprimés. 
            $com->article_id = $article->id; 

            $com->save(); 

            return redirect()->back()->with('success', 'Comment save. att validate = 1');
        }
    }

    // front newsletrrer register 

    public function newsletterstore(Request $request){

        $request->validate([ "newsemail" => "required|email" ]);
    
        $exist = Newsletter::where('email', $request->newsemail)->get(); 
        $count = count($exist); 

        if($count == 1){
            // je voulais faire une validation "if email exist --> t\'es deja inscrit, mais c'est pas secu. 
            $exist[0]->subscribe = 1; 
            $exist[0]->save(); 
            Mail::to($request->newsemail)->send(new NewsBienvSender($request)); 
            return redirect()->back()->with('success','E-mail bien reenregistrer dans l newsletter !'); 
        }else{
            $newnewsemail = new Newsletter(); 
            $newnewsemail->email = $request->newsemail;
            $newnewsemail->subscribe = 1; // par def s'il s'enregistre c'est pour recevoir de la pub. 

            $newnewsemail->save(); 

            Mail::to($request->newsemail)->send(new NewsBienvSender($request)); 

            return redirect()->back()->with('success','E-mail bien enregistrer dans l newsletter !')->withErrors('error', 'Erreur...?'); 
        }

    }


    public function newsunsub($email){
        $email = Newsletter::where('email', $email)->get(); 
        if($email){
            if($email[0]->subscribe == 1){
                $email[0]->subscribe = 0; 
                $email[0]->save();
                return redirect()->route('front.index')->with('success', "unsub ok "); 
            }else{
                return redirect()->route('front.index')->with('error', 'E-mail non trouvé'); 
            }
        }else{
            return redirect()->route('front.index')->with('error', 'E-mail non trouvé'); 
        }
    }
}
