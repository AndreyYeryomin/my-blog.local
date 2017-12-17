@extends('layouts.master')

@section('content')  
<div class="col-sm-8 blog-main">
<h1>{{$post->title}}</h1>
<img src="{{$post->img_path}}" alt="">
{!!$post->body!!}
<div class="blog-post-control ">
          @if(Auth::user() == $post->user)
          <a href="/posts-edit/{{$post->id}}">Edit</a>
          <a href="/posts-delete/{{$post->id}}">Delete</a>
          @endif
        </div>
</div>


@endsection