@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


        <form method = "POST" action= '/blog/update/{{ $post->post_id}}'>
            @csrf
            <p class="font-weight-bold">EDIT BLOG</p>
            <div class="form-group">
                <label for="title">Blog Title: </label>
                <input type="title" name="title" class="form-control" id="title" placeholder='{{ $post->post_title}}'>
            </div>

            <div class="form-group">
                <label for="content">Blog Content:</label>
                <textarea class="form-control" name="content" id="content" rows="7" placeholder='{{ $post->post_content}}'></textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-primary btn-lg">Update Blog</button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection
