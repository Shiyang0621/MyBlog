@extends('layout.app')

@section('title','New Post')

@section('content')

<div class='container'>
    <form action="{{route('create')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="title">Title</label><br>
            <input type="text" name="title" id="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="content">Content</label><br>
            <input type="text" name="content" id="content" class="form-control">
        </div>

        <!-- 图片上传字段的容器 -->
        <div class="form-group">
            <label for="image">Images</label><br>
            <div id="image-upload-fields">
                <input type="file" name="images[]" id="image-upload-0" class="form-control" accept="image/*" onchange="previewImage(this, 0)"  multiple>
                <img id="preview-0" style="width: 200px; margin-top: 10px; display: none;">
            </div>
        </div>
        

        <div class='form-group'>
            <button type="submit">New Post</button>
        </div>

    </form>
</div>

@endsection

@section('scripts')
    <!-- 引入自定义的JS文件 -->
    <script src="{{ asset('js/image-upload.js') }}"></script>
@endsection
