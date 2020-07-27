@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">


        <form method = "POST" action= "{{ route('blog.store') }}">
            @csrf
            <p class="font-weight-bold">Create your blog today!</p>
            <div class="form-group">
                <label for="title">Blog Title: </label>
                <input type="title" name="title" class="form-control" id="title">
            </div>

            <div class="form-group">
                <label for="content">Blog Content:</label>
                <textarea class="form-control" name="content" id="content" rows="7"></textarea>
            </div>

            <div>
                <button type="submit" class="btn btn-success btn-lg">Publish Blog</button>
            </div>
        </form>
    </div>
    </div>
</div>
@endsection
