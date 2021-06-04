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
        $logo       = asset("img/big-logo.png"); 
        $carous     = Pagehomecarousel::all(); // caruosel 
        $thservs    = Services::all()->random(3);  // 3 services rand 
        $homeinfo   = Pagehome::all()->first(); // titres et informations generales 
        $testims    = Testimontial::orderBy('id', 'desc')->take(6)->get(); 
        return view('home', compact('logo', 'carous', 'thservs', 'homeinfo', 'testims')); 
    }
}
