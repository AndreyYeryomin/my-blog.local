@extends('layouts.master')

@section('content')  
<div class="col-sm-8 blog-main">
<h1>{{$post->title}}</h1>

{{$post->body}}
<div class="comments">
	@foreach($post->comment as $comment)
		<article>
			{{$comment->body}}
		</article>
	@endforeach
</div>
<hr>
<form method="POST" action="/posts/{{$post->id}}/comments">

{{csrf_field()}}

  <div class="form-group">
    <label for="body">Body</label>
    <textarea name="body" class="form-control" id="body" ></textarea>
  </div>
 <div class="form-group">
  <button type="submit" class="btn btn-primary">Add comment</button>
</div>
	
</form>
	@include('layouts.errors')
</div>

@endsection