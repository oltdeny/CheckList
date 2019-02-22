@extends('layouts.app')

@section('content')
    @guest
        <div class="container">
            Log in, or register!
        </div>
    @else
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            You are logged in!
                        </div>
                            <a class="btn btn-primary" href="{{ route('lists.index') }}" role="button">Check Lists</a>
                            @can('lookAll', \App\Models\CheckList::class)
                                <a class="btn btn-primary" href="{{ route('users.index') }}" role="button">Users</a>
                            @endcan
                    </div>
                </div>
            </div>
        </div>
    @endguest
@endsection
