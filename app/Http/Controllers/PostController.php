<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Image;

use Illuminate\Http\Request;

class PostController extends Controller
{

  public function index(){
    return view('posts.index');
  }


  public function store(Request $request) {

    // 验证请求
    $request->validate([
        'title' => 'required',
        'content' => 'required',
        'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',  // 验证每个图片
    ]);

    // 创建帖子
    $post = Post::create([
        'title' => $request->title,
        'content' => $request->content,
    ]);

    // 检查是否接收到图片数组
    if ($request->hasFile('images')) {
      foreach ($request->file('images') as $imageFile) {
          // 调试信息，检查是否多个文件上传成功

  
          $imageName = time() . '_' . $imageFile->getClientOriginalName();
          $imagePath = public_path('images');
          $imageFile->move($imagePath, $imageName);
  
          Image::create([
              'image' => 'images/' . $imageName,
              'post_id' => $post->id
          ]);
      }
    } else {
        // 调试：检查未接收到图片时的情况
        dd("No images received");
    }

    return redirect()->route('posts.index');
}



  public function new_post(){
    return view('posts.new_post');
  }


}
