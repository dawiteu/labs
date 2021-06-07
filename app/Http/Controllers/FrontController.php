<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
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
        $teamgro    = count(User::all()) >= 2 ? User::all()->random(2) : User::all(); 
       
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
        $servs    = Services::all()->random(9);
        $serv2    = Services::all()->random(6); 
        
        $footer = $this->footer();
        return view('services', compact('servinfo', 'servs', 'serv2', 'footer')); 
    }


    // FRONT PAGE CONTACT
    public function contact(){ 
        $footer = $this->footer();
        return view('contact', compact('footer')); 
    }

    // front page contact SENDING FORM 

    public function submitcontact(Request $request){ 

        if($request->has('submitcontactform')){ 

            $request->validate([
                "name" => "required", 
                "email"=> "required", 
                "message" => "required"
            ]);
    
            dd('submit!');
        }
    }

    // front page BLOG 
    public function blog(){ 
        $arts = Article::paginate(3); 
        $cats = Categorie::all();
        $tags = Tag::all(); 
        $footer = $this->footer(); 
        return view('blog', compact('arts','cats','tags','footer')); 
    }

    public function showart(Article $id){ 
        return view(''); 
    }


}
