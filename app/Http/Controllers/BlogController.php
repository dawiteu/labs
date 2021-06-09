<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $arts = Article::paginate(4); 
        return view('admin.blog.index', compact('arts'));
    }

    public function create(){
        
        return view();
    }

    public function show(Article $article){
        return view('admin.blog.show', compact('article')); 
    }
}
