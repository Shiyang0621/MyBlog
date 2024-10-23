@extends('layout.app')
@section('title', 'The Post')
@section('content')

<div class="container mt-5">
    <h2 class="mb-4">My Post</h2>
    @if($posts->isEmpty())
        <div class="alert alert-warning" role="alert">
            No Posts available
        </div>
    @else
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <section class="card-body">
                            <h2 class="card-title">{{ $post->title }}</h2>
                            <p class="card-text">{{ Str::limit($post->content, 100) }}</p>
                            @if($post->image)
                                @foreach($post->image as $image)
                                    <figure class="card-img-top">
                                        <img src="{{ $image->image }}" alt="Post Image" class="img-fluid" style="width: 100%; height: auto;">
                                    </figure>
                                @endforeach
                            @endif
                        </section>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More</a>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit Post</a>
                            <a href="{{ route('posts.delete', $post->id) }}" class="btn btn-danger">Delete Post</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
