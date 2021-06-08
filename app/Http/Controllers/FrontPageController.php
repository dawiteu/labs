<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index(){
        return view('admin.pages.home');
    }

    public function edit($page){
        switch ($page) {
            case 'home':
                dd('home');
                break;
            case 'home-car':
                    dd('Home: Carousel only');
                break;
            case 'services':
                dd('services');
                break;
            case 'contact':
                dd('contact');
                break;
                                
            default:
                return redirect()->back()->with('error', 'Erreur 404'); 
                break;
        } 
    }
}
