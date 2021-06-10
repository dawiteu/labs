<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Providers\IconServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class ServicesController extends Controller
{
    public function index(){
        $this->authorize('isWebMaster', Auth::user()); 

        $services = Services::where('disabled', '0')->paginate(5); 
        return view('admin.services.index', compact('services')); 
    }

    public function create(){
        $allservs = IconServiceProvider::allIcons();
        return view('admin.services.add', compact('allservs')); 
    }

    public function store(Request $request, Services $service){

        $this->authorize('isWebMaster', Auth::user()); 

        $request->validate([
            "icon" => "required",
            "titre" => "required", 
            "description" => "required|max:200"
        ]);

        $service->icone       = $request->icon; 
        $service->titre       = $request->titre; 
        $service->description = $request->description; 
        $service->disabled = 0; 

        $service->save(); 

        return redirect()->route('services.all')->with('success', 'Service bien ajouté'); 
    }

    public function edit(Services $service){
        $this->authorize('isWebMaster', Auth::user()); 

        $allservs = IconServiceProvider::allIcons();
        return view('admin.services.edit', compact('service', 'allservs')); 
    }

    public function update(Request $request, Services $service){ 

        $this->authorize('isWebMaster', Auth::user()); 


        $request->validate([
            "icon" => "required",
            "titre" => "required", 
            "description" => "required|max:200"
        ]);

        $service->icone        = $request->icon; 
        $service->titre       = $request->titre; 
        $service->description = $request->description; 
        $service->disabled = 0; 

        $service->save(); 

        return redirect()->route('services.all')->with('success', 'Service bien modifié'); 

    }



    public function searchicones(){
        $allservs = IconServiceProvider::allIcons();
        //Paginator::make(30, )
        return view('admin.services.icones', compact('allservs')); 
    }

    public function destroy(Services $service){
        $service->disabled = 1; 
        $service->save(); 
        return redirect()->route('services.all')->with('success', 'Service bien supprimé'); 
    }
}
