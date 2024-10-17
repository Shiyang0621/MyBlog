<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('posts.index');
});

Route::get('/post/new_post',[PostController::class,'new_post'])->name('new_post');
