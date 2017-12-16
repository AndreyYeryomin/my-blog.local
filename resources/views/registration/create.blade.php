@extends('layouts.master')

@section('content')
<div class="col-sm-8">
	<h1>Register</h1>
	<form method="POST" action="/reg">

{{csrf_field()}}

  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" id="email" ></input>
  </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" id="name" ></input>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" ></input>
  </div>
  <div class="form-group">
    <label for="password_confirmation">Confirm Password</label>
    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" ></input>
  </div>

 <div class="form-group">
  <button type="submit" class="btn btn-primary">Registry</button>
</div>
	
</form>
@include('layouts.errors')
</div>
@endsection