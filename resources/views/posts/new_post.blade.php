@extends('layout.app')

@section('title','New Post')

@section('content')


<div class='container'>
    <form action="{{route('new_post')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="content">Content</label><br>
            <input type="text" name="content" id="content" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">Image</label><br>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class='form-group'>
            <button type="submit">New Post</button>
        </div>





    </form>
</div>



@endsection