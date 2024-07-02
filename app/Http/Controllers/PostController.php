<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{ 
    public function index(){
        return view('blog.index');
    }
    public function create(){
        $post=new Post();
        $post->titre="Bonjour";
        return view('blog.create',['post'=>$post]);
    }
    public function store(FormPostRequest $request){
         $post=Post::create($request->validate());
         return redirect()->route('blog.show',['slug'=>$post->slug,'post'=>$post->id])->with('success',"L'article a bien ete sauvegarde");
    }
    public function edit(post $post){
        return view('blog.edit',['post'=>$post]);
    }
    public function update(Post $post, FormPostRequest $request){
        $post->update($request->validated());
        return redirect()->route('blog.show',['slug'=>$post->slug,'post'=>$post->id])->with('success',"L'article a bien ete modifie");
        
    }

}
