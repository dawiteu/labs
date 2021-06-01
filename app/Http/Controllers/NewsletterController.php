<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsletterController extends Controller
{
    public function index(){
        $this->authorize('isWebMaster', Auth::user()); 

        $newss = Newsletter::all()->where('subscribe', 1); 
        return view('admin.newsletter.index', compact('newss')); 
    }

    public function store(Request $request){ 

    }

    public function destroy(Newsletter $email){ 

    }
}
