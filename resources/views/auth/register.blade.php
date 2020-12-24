@extends('layouts.app')

@section('head-title', 'Register')

@section('main-content')
<h1>Register new account</h1>
<form action="/register" method="POST">
  @csrf
    <div class="mb-3">
      <input name="email" type="email" class="form-control" placeholder="Email address">
      @include('partials.error-message', ['field' => 'email'])
    </div>
    <div class="mb-3">
        <input name="name" type="text" class="form-control" placeholder="Name">
        @include('partials.error-message', ['field' => 'name'])
    </div>
    <div class="mb-3">
      <input name="password" type="password" class="form-control" placeholder="Password">
      @include('partials.error-message', ['field' => 'password'])
    </div>
    <div class="mb-3">
        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm password">
        @include('partials.error-message', ['field' => 'password_confirmation'])
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection