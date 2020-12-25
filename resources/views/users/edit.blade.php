@extends('layouts.app')

@section('head-title', 'Edit ' . $user->title)

@section('main-content')
<h1>Edit user roles</h1>
<form action="{{ route('users.update', compact('user')) }}" method="POST">
  @csrf
    <div class="mb-3">
        <h4 class="card-title">{{ $user->name }}</h4>
        <p>{{ $user->email }}</p>
        <p>roles: 
            @foreach ($user->roles as $role)
                <span>{{ $role->title }}</span>
            @endforeach
        </p>
    </div>
    <div class="mb-3">
        <label for="roles" class="form-label">roles:</label>
        <select id="roles" class="form-select" name="roles[]" multiple>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{ $role->title }}</option>
            @endforeach
        </select>
        @include('partials.error-message', ['field' => 'roles'])
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@include('partials.successMessage')
@endsection