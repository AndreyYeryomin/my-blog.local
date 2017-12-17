@extends('layouts.master')

@section('content')  
<div class="col-sm-8 blog-main">
<h1>Edit {{$post->title}}</h1>
<form method="POST" action="/posts-update/{{$post->id}}/">

{{csrf_field()}}

  <div class="form-group">
    <label for="title">Title: </label>
    <input type="text" name="title" class="form-control" id="title" placeholder="title" value="{{$post->title}}">
  </div>

  <div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" class="form-control" id="body" >{{$post->body}}</textarea>
  </div>
   <div class="form-group">
  <button type="submit" class="btn btn-primary">Update</button>
</div>
</form>

	@include('layouts.errors')
</div>

@endsection