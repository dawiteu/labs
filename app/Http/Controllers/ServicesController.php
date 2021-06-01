<?php

namespace App\Http\Controllers;

use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function index(){
        $services = Services::paginate(5); 
        return view('admin.services.index', compact('services')); 
    }

    public function edit(Services $service){
        return view('admin.services.edit', compact('service')); 
    }
}
