<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Category;

class PageController extends Controller
{
    public function home(){
        $threads = Thread::orderBy('id', 'DESC')->paginate();
        return view('home', ['threads' => $threads]);
    }
    public function category(Category $category){

        $threads = $category->threads()->orderBy('id', 'DESC')->paginate();
        return view('category' , compact('category', 'threads'));
    }
    public function tag($tag){
        return view('tag' , compact('tag'));
    }
    public function thread($thread){
        return view('thread' , compact('thread'));
    }

}
