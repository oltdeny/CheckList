@extends('layouts.app')

@section('content')

<a class="btn btn-primary" href="{{ route('lists.create') }}" role="button">Add check-list</a>
@if(session('error'))
	<div class="alert-danger">
		{{ session('error') }}
	</div>
@endif
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
				  @can('delete', $list)
					<form action="{{ route('lists.destroy', $list) }}" method="POST">
						@method('DELETE')
						@csrf
						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
				  @endcan
		      </td>
	    	</tr>
		@endforeach 
	  </tbody>
</table>
    
@endsection