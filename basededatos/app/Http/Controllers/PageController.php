<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Category;
use App\Models\Tag;

class PageController extends Controller
{
    public function home(){
        $threads = Thread::orderBy('id', 'DESC')
        ->with('category', 'tags', 'user')
        ->withCount('comments')
        ->paginate();
        return view('home', ['threads' => $threads]);
    }
    public function category(Category $category){

        $threads = $category
        ->threads()
        ->with('category', 'tags', 'user')
        ->withCount('comments')
        ->orderBy('id', 'DESC')
        ->paginate();
        return view('category' , compact('category', 'threads'));
    }
    public function tag(Tag $tag){
        $threads = $tag
        ->threads()
        ->with('category', 'tags', 'user')
        ->withCount('comments')
        ->orderBy('id', 'DESC')->paginate();
        return view('tag' , compact('tag' ,'threads'));
    }
    public function thread(Thread $thread){
        $comments = $thread
        ->comments()
        ->orderBy('id', 'DESC')
        ->with('user')
        ->get();
        return view('thread' , compact('thread', 'comments'));
    }

}
