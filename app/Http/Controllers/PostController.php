<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
     
        $posts = Post::latest('date')->paginate(2);

        return view('pages.posts', compact('posts'));
    }

    public function show(Post $post){

        return view('pages.post', compact('post'));
    }


    // funkcja zwraca post po id u góry łatwijszy zapis 
    // public function show($id){

    //     $post = Post::findOrFail($id);

    //     $post = Post::find($id); if(is_null($post)) return abort(404);  // jeśli id nie jest dostępne w bazie blad 404

    //     return view('pages.post', compact('post'));
    // }
}
