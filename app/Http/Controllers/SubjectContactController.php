<?php

namespace App\Http\Controllers;

use App\Models\SubjectContact;
use Illuminate\Http\Request;

class SubjectContactController extends Controller
{
    public function index(){
        $sujs = SubjectContact::where('deleted', 0)->get();
        return view('admin.cont.index', compact('sujs')); 
    }
}
