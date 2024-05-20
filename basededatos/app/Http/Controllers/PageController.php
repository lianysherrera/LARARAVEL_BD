<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thread;
use App\Models\Category;
use App\Models\Tag;

class PageController extends Controller
{
    public function home(){
        $title = 'Preguntas y Respuestas';
        $description = ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente odio rerum labore nostrum doloremque vel enim praesentium nulla nihil excepturi provident temporibus molestiae, quaerat voluptatem soluta magnam illum. Laudantium? ';

        $threads = Thread::orderBy('id', 'DESC')
        ->with('category', 'tags', 'user')
        ->withCount('comments')
        ->paginate();
        return view('list', compact('title', 'description', 'threads'));
    }
    public function category(Category $category){
        $title = "Categoria: $category->name";
        $description = ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente odio rerum labore nostrum doloremque vel enim praesentium nulla nihil excepturi provident temporibus molestiae, quaerat voluptatem soluta magnam illum. Laudantium? ';

        $threads = $category
        ->threads()
        ->with('category', 'tags', 'user')
        ->withCount('comments')
        ->orderBy('id', 'DESC')
        ->paginate();
        return view('list' , compact('title', 'description', 'category', 'threads'));
    }
    public function tag(Tag $tag){
        $title = "Etiqueta: $tag->name";
        $description = ' Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam, sapiente odio rerum labore nostrum doloremque vel enim praesentium nulla nihil excepturi provident temporibus molestiae, quaerat voluptatem soluta magnam illum. Laudantium? ';

        $threads = $tag
        ->threads()
        ->with('category', 'tags', 'user')
        ->withCount('comments')
        ->orderBy('id', 'DESC')->paginate();
        return view('list' , compact('title', 'description', 'tag' ,'threads'));
    }
    public function thread(Thread $thread){
        $title = $thread->title;
        $description =  'Categoria: ' . $thread->category->name;

        $comments = $thread
        ->comments()
        ->orderBy('id', 'DESC')
        ->with('user')
        ->get();
        return view('thread' , compact('title', 'description', 'thread', 'comments'));
    }

}
