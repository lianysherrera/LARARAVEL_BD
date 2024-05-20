<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Category;
use App\Models\Tag;

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
    public function tag(Tag $tag){
        $threads = $tag->threads()->orderBy('id', 'DESC')->paginate();
        return view('tag' , compact('tag' ,'threads'));
    }
    public function thread(Thread $thread){
        return view('thread' , compact('thread'));
    }

}
