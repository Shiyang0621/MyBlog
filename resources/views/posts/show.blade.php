@extends('layout.app')
@section('title', $post->title)
@section('content')

<div class="container mt-5">
    <h1 class="mb-4">{{ $post->title }}</h1>
    <p class="lead">{{ $post->content }}</p>

    @if($post->image)
        <div class="row">
            @foreach($post->image as $image)
                <div class="col-md-4 mb-3">
                    <figure class="card-img-top">
                        <img src="../{{ $image->image }}" alt="Post Image" class="img-fluid rounded" style="width: 100%; height: auto;">
                    </figure>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
