<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Image;

use Illuminate\Http\Request;

class PostController extends Controller
{
  public function store(Request $request){

    $post = new Post();
    $image = new Image();

    //Request to form validate
    $request->validate([
        'title'=> 'required',
        'content'=>'required',
        'image.*' =>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $post = Post::create([
        'title'=> $request->title,
        'content'=> $request->content,
    ]);

    if($request->hasFile('image')){
        foreach ($request->file('image') as $file) {
            $path = $imageFile->store('images','public');
            Image::create([
                'path' =>$path,
                'post_id' => $post->id
            ]);
        }
    }
    return redirect()->route('posts.index');
  }

  public function new_post(){
    return view('posts.new_post');
  }


}
