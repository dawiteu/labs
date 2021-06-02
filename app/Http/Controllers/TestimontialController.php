<?php

namespace App\Http\Controllers;

use App\Models\Testimontial;
use Illuminate\Http\Request;

class TestimontialController extends Controller
{
    public function index(){
        $tests = Testimontial::paginate(10); 
        return view('admin.testimontial.index', compact('tests')); 
    }

}
