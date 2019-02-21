@extends('layouts.app')

@section('content')

<a class="btn btn-primary" href="{{ route('lists.create') }}" role="button">Add check-list</a>

<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">id</th>
	      <th scope="col">Name</th>
	      <th scope="col">User</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach ($lists as $list)
    		<tr>
		      <th scope="row"><a href="{{ route('lists.show', $list->id) }}">{{ $list->id }}</a></th>
		      <td>{{ $list->name }}</td>
		      <td>{{ $list->user->name }}</td>
		      <td>
		      	<form action="{{ route('lists.destroy', $list->id) }}" method="POST">
	 	 		 	@method('DELETE')
    				@csrf
  					<button type="submit" class="btn btn-danger">Delete</button>
				</form>	      	
		      </td>
	    	</tr>
		@endforeach 
	  </tbody>
</table>
    
@endsection