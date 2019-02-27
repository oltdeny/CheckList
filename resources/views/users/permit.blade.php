@extends('layouts.app')

@section('content')
    <a class="btn btn-outline-info" href="{{ route('users.index') }}" role="button">Users</a>

    <div class="card text-center">
        <div class="card-header">
            {{ $user->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Permissions of {{ $user->name }}'s:</h5>
            <ul class="list-group">
                @foreach($user->permissions as $perm)
                    <li class="list-group-item">
                        {{ $perm->name }}
                        <form action="{{ route('users.forbid', [$user->id, $perm->id]) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Forbid</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <form action="{{ route('users.permit', $user->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="permission">Add permission</label>
                    <select name="permission" id="permission" class="custom-select custom-select-sm">
                        @foreach($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add permission</button>
            </form>

        </div>
    </div>

@endsection