@extends('layouts.app')

@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            @if($user->status === 'blocked')
            <tr class="table-secondary">
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    @can('edit', \App\User::class)
                        <form action="{{ route('users.edit', $user->id) }}" method="GET">
                            <button type="submit" class="btn btn-outline-dark">Edit</button>
                        </form>
                    @endcan
                    @can('block', \App\User::class)
                        <form action="{{ route('users.unblock', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success">Unblock!</button>
                        </form>
                    @endcan
                </td>
            </tr>
            @else
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->status }}</td>
                <td>
                    @can('edit', \App\User::class)
                        <form action="{{ route('users.edit', $user->id) }}" method="GET">
                            <button type="submit" class="btn btn-outline-dark">Edit</button>
                        </form>
                    @endcan
                    @can('block', \App\User::class)
                        <form action="{{ route('users.block', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Block!</button>
                        </form>
                    @endcan
                </td>
            </tr>
            @endif
        @endforeach
        </tbody>
    </table>

@endsection