@extends('layouts.app')

@section('head-title', 'Login')

@section('main-content')
<h1>Login to your account</h1>
<form action="/login" method="POST">
  @csrf
    <div class="mb-3">
      <input name="email" type="email" class="form-control" placeholder="Email address">
      @include('partials.error-message', ['field' => 'email'])
    </div>
    <div class="mb-3">
      <input name="password" type="password" class="form-control" placeholder="Password">
      @include('partials.error-message', ['field' => 'password'])
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection