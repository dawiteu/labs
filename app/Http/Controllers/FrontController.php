<?php

namespace App\Http\Controllers;

use App\Models\Pagehome;
use App\Models\Pagehomecarousel;
use App\Models\Services;
use App\Models\Testimontial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    

    //page HOME: 

    public function index(){
        $errors = []; 
        $logo       = asset("img/big-logo.png"); 
        $carous     = Pagehomecarousel::all(); // caruosel 
        $rservices  = count(Services::all()) > 0 ? [ Services::all()->random(3) , Services::all()->random(9) ] : array_push($errors, 'services');
        $homeinfo   = count(Pagehome::all()) > 0 ? Pagehome::all()->first() : array_push($errors, 'Contenu page home'); // titres et informations generales 
        $testims    = count(Testimontial::all()) > 0 ? Testimontial::orderBy('id', 'desc')->take(6)->get() : array_push($errors, 'Testimontials clients'); 

        if(empty($errors)){
            return view('home', compact('logo', 'carous', 'rservices', 'homeinfo', 'testims')); 
        }else{
            die('Erreur DB : <br/> + ' . implode(' <br/> + ', $errors) . " <br/>try: <br/> <code> php artisan migrate:fresh <b>--seed</b> </code> "); 
        }
        
    }
}
