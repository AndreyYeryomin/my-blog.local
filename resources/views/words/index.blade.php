@extends('layouts.master')

@section('content')

   <div class="col-sm-8 blog-main">
   		<ul>
			@foreach($words as $word)
				<li>{{$word->body}}</li>
			@endforeach
		</ul>
	 	<form method="POST" action="/words/create">
	 		{{csrf_field()}}
	 		<div class="form-group">
	    	<label for="title">Add filtered word: </label>
	    	<input type="text" name="body" class="form-control" id="body">
	  		</div> 
	  		<button type="submit" class="btn btn-default">Add new Word</button>
	 	</form>
	 	<form method="POST" action="/words/delete">
	 		{{csrf_field()}}
	 		<div class="form-group">
		    	<label for="title">Select filtered word: </label>
		    	<select name="word_id" id="word_id" class="form-control">
		    		@foreach($words as $word)
		    			<option value="{{$word->id}}">{{$word->body}}</option>
		    		@endforeach$word->body
		    	</select>
	  		</div> 
	  		<button type="submit" class="btn btn-default">Delete Word</button>
	 	</form>
    </div><!-- /.blog-main -->
@endsection