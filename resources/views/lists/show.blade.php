@extends('layouts.app')

@section('content')

<a class="btn btn-primary" href="{{ route('lists.items.create', $list) }}" role="button">Add item</a>


<table class="table">
	  <thead class="thead-dark">
	    <tr>
	      <th scope="col">id</th>
	      <th scope="col">Name</th>
	      <th scope="col">Status</th>
	      <th scope="col">Action</th>
	    </tr>
	  </thead>
	  <tbody>
	    @foreach ($list->items as $item)
    		<tr>
		      <th scope="row">{{ $item->id }}</th>
		      <td>{{ $item->name }}</td>
		      <td>{{ $item->status }}</td>
		      <td>
		      	<div>
		      		<form action="{{ route('lists.items.destroy',  [$list->id, $item->id]) }}" method="POST">
	 	 		 		@method('DELETE')
    					@csrf
  						<button type="submit" class="btn btn-danger">Delete</button>
					</form>
		      	</div>
		      	@if($item->status === 'todo')
		      	<div>
		      		<form action="{{ route('lists.items.update', [$list->id, $item->id]) }}" method="POST">
	 	 		 		@method('PUT')
    					@csrf
  						<button type="submit" class="btn btn-success">Done!</button>
					</form>
		      	</div>
		      	@endif
		      </td>
	    	</tr>
		@endforeach 
	  </tbody>
</table>
    
@endsection