<?php

namespace App\Http\Controllers;

use App\Models\Pagehome;
use App\Models\Pagehomecarousel;
use App\Models\Services;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    

    //page HOME: 

    public function index(){
        $logo       = asset("img/big-logo.png"); 
        $carous     = Pagehomecarousel::all();
        $thservs    = Services::all()->random(3); 
        $homeinfo   = Pagehome::all()->first(); 
        return view('home', compact('logo', 'carous', 'thservs', 'homeinfo')); 
    }
}
