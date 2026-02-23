<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){ return Post::all(); }

    public function show($id){ return Post::findOrFail($id); }

    public function store(Request $r){
        return Post::create($r->only(['title','description']));
    }

    public function update(Request $r,$id){
        $post = Post::findOrFail($id);
        $post->update($r->only(['title','description']));
        return $post;
    }

    public function destroy($id){
        Post::findOrFail($id)->delete();
        return response()->json(['message'=>'Deleted']);
    }
}