@extends('layouts.master')

@section("content")

<div class="col-sm-8 blog-main">
<h1>Publish a Posts</h1>

<form method="POST" action="/posts" enctype="multipart/form-data">

{{csrf_field()}}

  <div class="form-group">
    <label for="title">Title: </label>
    <input type="text" name="title" class="form-control" id="title" placeholder="title">
  </div>

  <div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" class="form-control" id="body" ></textarea>
  </div>
 <div class="form-group">
    <label for="img_path">File: </label>
    <input type="file" name="img_path" class="form-control" id="img_path" >
  </div>
 
 <div class="form-group">
  <button type="submit" class="btn btn-primary">Publish</button>
</div>
	@include('layouts.errors')
</form>
</div>

@endsection