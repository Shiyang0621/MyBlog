@extends('layout.app')

@section('title', 'Edit Post')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Edit Post</h2>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" placeholder="Enter the post title" required>
        </div>

        <div class="form-group mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Write the content here" required>{{ $post->content }}</textarea>
        </div>
        @if($post->image)
        @foreach($post->image as $images)
        <figure class='card-img-top'>
            <img src="{{asset($images->image)}}" alt="Post Image" style="width:20%;">
            <label for="remove_image"><input type="checkbox" name='remove_image[]' value='{{$images->id}}'>Remove image</label>
        </figure>
        @endforeach
        @endif
           <figure class=>    
        <div class="form-group mb-3">
            <label for="image" class="form-label">Images</label>
            <div id="image-upload-fields">
                <div class="image-upload-group" id="upload-group-0" style="position: relative;">
                    <input type="file" name="images[]" id="image-upload-0" class="form-control" accept="image/*" onchange="previewImage(this, 0); showNextUploadField(1)">
                    <img id="preview-0" class="img-fluid mt-3" style="width: 200px; display: none; position: relative;">
                    <span class="remove-btn btn btn-danger btn-sm position-absolute top-0 start-100 translate-middle p-2" id="remove-0" style="display:none; cursor:pointer;" onclick="removeUploadField(0)">×</span>
                </div>
            </div>
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-primary">Update Post</button>
        </div>

    </form>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/image-upload.js') }}"></script>
@endsection
