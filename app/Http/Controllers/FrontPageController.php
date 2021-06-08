<?php

namespace App\Http\Controllers;

use App\Models\Pagehome;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index(){
        return view('admin.pages.home');
    }

    public function edit($page){
        switch ($page) {
            case 'home':
                $infopage = Pagehome::all()->first(); 
                return view('admin.pages.edit', compact('page', 'infopage'));
                break;
            case 'home-car':
                return view('admin.pages.edit', compact('page'));
                break;
            case 'services':
                return view('admin.pages.edit', compact('page'));
                break;
            case 'contact':
                return view('admin.pages.edit', compact('page'));
                break;
                                
            default:
                return redirect()->back()->with('error', 'Erreur 404'); 
                break;
        } 
    }
}
