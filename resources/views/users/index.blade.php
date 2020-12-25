@extends('layouts.app')

@section('head-title', 'Users')

@section('main-content')
<ul class="list-group">
    @foreach ($users as $user)
        <div class="list-group">
            <div class="list-group-item">
                <h4 class="card-title">{{ $user->name }}</h4>
                <p>email: {{ $user->email }}</p>
                <p>roles: 
                    @foreach ($user->roles as $role)
                        <span>{{ $role->title }}</span>
                    @endforeach
                </p>
                <a href="{{ route('users.edit', compact('user')) }}">Edit Roles</a>
            </div>
        </div>
    @endforeach
    {{ $users->links() }}
</ul>
@endsection