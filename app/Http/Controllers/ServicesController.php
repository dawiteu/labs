<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Providers\IconServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class ServicesController extends Controller
{
    public function index(){
        $services = Services::paginate(5); 
        return view('admin.services.index', compact('services')); 
    }

    public function edit(Services $service){
        $allservs = IconServiceProvider::allIcons();
        return view('admin.services.edit', compact('service', 'allservs')); 
    }

    public function searchicones(){
        $allservs = IconServiceProvider::allIcons();
        //Paginator::make(30, )
        return view('admin.services.icones', compact('allservs')); 
    }
}
