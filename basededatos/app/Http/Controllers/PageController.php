<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        return view('home');
    }
    public function category($category){
        return view('category' , compact('category'));
    }
    public function tag($tag){
        return view('tag' , compact('tag'));
    }
    public function thread($thread){
        return view('thread' , compact('thread'));
    }

}
