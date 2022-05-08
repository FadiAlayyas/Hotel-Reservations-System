<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }



    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        return view('admin.posts.show', compact('post'));
    }


    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        if ($post->verfied == 1) {
            $post->verfied = 0;
            $post->save();
        } elseif ($post->verfied == 0) {
            $post->verfied = 1;
            $post->save();
        }

        return redirect()->route('admin.post.index');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
