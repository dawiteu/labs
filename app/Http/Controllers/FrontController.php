<?php

namespace App\Http\Controllers;

use App\Models\Pagehomecarousel;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    

    //page HOME: 

    public function index(){
        $logo = asset("img/big-logo.png"); 
        $carous = Pagehomecarousel::all(); 
        return view('home', compact('logo', 'carous')); 
    }
}
