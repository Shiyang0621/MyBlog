@extends('layout.app')

@section('title', 'New Post')

@section('content')

<div class="container mt-5">
    <h2 class="mb-4">Create a New Post</h2>
    <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter the post title" required>
        </div>

        <div class="form-group mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Write the content here" required></textarea>
        </div>

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
            <button type="submit" class="btn btn-primary">Create Post</button>
        </div>

    </form>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/image-upload.js') }}"></script>
@endsection
