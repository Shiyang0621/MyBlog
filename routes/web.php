<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/',[PostController::class,'index'])->name('posts.index');


Route::get('/post/new_post',[PostController::class,'new_post'])->name('new_post');

Route::post('/post/store',[PostController::class,'store'])->name('create');
