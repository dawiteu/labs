<?php

namespace App\Http\Controllers;

use App\Models\Pagecontact;
use App\Models\Pagehome;
use App\Models\Pagehomecarousel;
use App\Models\Pageservices;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index(){
        return view('admin.pages.home');
    }

    public function edit($page){
        switch ($page) {
            case 'home':
                $infopage = Pagehome::first(); 
                return view('admin.pages.edit', compact('page', 'infopage'));
                break;
            case 'home-car':
                $infopage = Pagehomecarousel::all(); 
                return view('admin.pages.edit', compact('page', 'infopage'));
                break;
            case 'services':
                $infopage = Pageservices::first();
                return view('admin.pages.edit', compact('page', 'infopage'));
                break;
            case 'contact':
                $infopage = Pagecontact::first();
                return view('admin.pages.edit', compact('page', 'infopage'));
                break;
                                
            default:
                return redirect()->back()->with('error', 'Erreur 404'); 
                break;
        } 
    }

    public function updateHome(Request $request){
        $request->validate([
            "t1" => "required",
            "desc1" => "required|min:10|max:400",
            "desc2" => "required|min:10|max:400",
            "btn1text" => "required", 
            "btn1link" => "required", 
            "videolink" => "required",
            "t2" => "required", 
            "t3" => "required",
            "btn2text" => "required", 
            "btn2link" => "required", 
            "t4" =>"required",
            "t5" => "required",
            "desc3" => "required",
            "btn3text" => "required",
            "btn3link" => "required",
            "imagelinkfile" => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]);
        //ToUPdate ;;
        $tup = Pagehome::all()->first(); 
        if($request->hasFile('imagelinkfile')){
            $request->file('imagelinkfile')->storePublicly('img/video/','public');
            $tup->imglink = "img/video/" . $request->file('imagelinkfile')->hashName();
        } // else if link -->file get content et compagnie, mais c'est pour la V0.2 ;; 
        $tup->t1 = $request->t1; 
        $tup->desc1 = $request->desc1;
        $tup->desc2 = $request->desc2;
        $tup->btn1text = $request->btn1text; 
        $tup->btn1link = $request->btn1link; 
        $tup->videolink = $request->videolink;
        $tup->t2 = $request->t2; 
        $tup->t3 = $request->t3; 
        $tup->btn2text = $request->btn2text; 
        $tup->btn2link = $request->btn2link; 
        $tup->t4 = $request->t4; 
        $tup->t5 = $request->t5; 
        $tup->desc3 = $request->desc3; 
        $tup->btn3text = $request->btn3text; 
        $tup->btn3link = $request->btn3link; 

        $tup->save(); 

        return redirect()->route('pages.index')->with('success', 'Page home bien actualisée');

    }

    public function updateServices(Request $request){
        $tup = Pageservices::first(); 

        foreach($request->all() as $key => $value) {
            if(($key != "_token") && ($key != "_method")){
                $tup->$key = $value; 
            }
        }
        $tup->save(); 

        return redirect()->route('pages.index')->with('success', 'Page services bien actualisée');
    }

    public function updateContact(Request $request){
        $tup = Pagecontact::first(); 

        foreach($request->all() as $key => $value) {
            if(($key != "_token") && ($key != "_method")){
                $tup->$key = $value; 
            }
        }

        $tup->save();
        
        return redirect()->route('pages.index')->with('success', 'Page contact bien actualisée');

    }

    public function updateHomeCar(Request $request, Pagehomecarousel $item){
        $request->validate([ "desc" => "required" ]); 

        if($request->file('newimg') != NULL){
            $request->file('newimg')->storePublicly('img/homecarousel/','public');
            $item->image = "img/homecarousel/". $request->file('newimg')->hashName();
        }
        $item->description = $request->desc; 
        $item->save(); 
        return redirect()->route('pages.index')->with('success', 'Element ds home car bien actualisée');
    }

    public function storeHomeCar(Request $request){
        $request->validate([ 
            "desc" => "required"
            "newimg" => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048']
        ]); 

        $item = new Pagehomecarousel(); 

        if($request->file('newimg') != NULL){
            $request->file('newimg')->storePublicly('img/homecarousel/','public');
            $item->image = "img/homecarousel/". $request->file('newimg')->hashName();
        }
        $item->description = $request->desc; 
        $item->priority = 0; 
        $item->save(); 
        return redirect()->route('pages.index')->with('success', 'Element ds home car bien ajouté');
    }
}
