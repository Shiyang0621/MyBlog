@extends('layout.app')
@section('title', $post->title)
@section('content')
<div class="container">
    <h1>{{$post->title}}</h1>
    <p>{{$post->content}}</p>

    @if($post->image)
        @foreach($post->image as $image)
           <figure class='card-img-top'>
               <img src="../{{$image->image}}" alt="Post Image" style="width:50%;">
           </figure>
        @endforeach
     @endif
</div>
@endsection
