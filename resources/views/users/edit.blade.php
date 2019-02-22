@extends('layouts.app')

@section('content')

    <div class="card text-center">
        <div class="card-header">
            {{ $user->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Count of possible check-lists: {{ $user->count }}</h5>
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="count">Change count:</label>
                    <input type="number" class="form-control" id="count" name="count" placeholder="Enter new count:">
                </div>
                <button type="submit" class="btn btn-primary">Change</button>
            </form>
        </div>
    </div>

@endsection