@extends('layouts.app')

@section('content')
	@if(session('error'))
		<div class="alert-danger">
			{{ session('error') }}
		</div>
	@endif
    <form action="{{ route('lists.store') }}" method="POST">
    	@csrf
    	<div class="form-group">
    		<label for="name">Enter check-list name</label>
    		<input type="text" class="form-control" id="name" name="name" placeholder="Name">
  		</div>
  		<button type="submit" class="btn btn-primary">Submit</button>
    </form>
    
@endsection