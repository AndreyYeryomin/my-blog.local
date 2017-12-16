@extends('layouts.master')

@section('content')
<div class="col-sm-8">
	<h1>Sign in</h1>
	<form method="POST" action="/login">

{{csrf_field()}}

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" ></input>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" ></input>
  </div>

 <div class="form-group">
  <button type="submit" class="btn btn-primary">Sign In</button>
</div>
	
</form>
@include('layouts.errors')
</div>
@endsection