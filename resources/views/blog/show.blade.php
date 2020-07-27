@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('flash_message'))
    <div class="alert alert-success">
        {{ Session::get('flash_message') }}
    </div>
    @endif
    <div class="row">
            @foreach ($posts as $post =>$value)
            <div class="col-sm-4">
                <div class="card border-success mb-3" style="height: 13rem;">
                    <div class="card-header">Blog by: {{ $value->user->name }}
                    </div>
                    <div class="card-body">
                      <h5 class="card-title ">{{ $value->post_title }}</h5>
                      <p class="card-text text-success">{{ $value->post_content }}</p>
                      {{--  <a href="#" class="btn btn-success">Show More</a>  --}}
                      <a href='/blog/edit/{{ $value->post_id }}' id='{{ $value->post_id }}' class="btn btn-primary">Edit</a>
                      <a href='/blog/delete/{{ $value->post_id }}' id='{{ $value->post_id }}' class="btn btn-danger">Delete</a>
                    </div>



                </div>
            </div>
                @endforeach

    </div>
</div>
@endsection
