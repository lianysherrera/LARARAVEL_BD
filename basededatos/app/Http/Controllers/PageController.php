<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;

class PageController extends Controller
{
    public function home(){
        $threads = Thread::orderBy('id', 'DESC')->paginate();
        return view('home', ['threads' => $threads]);
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
