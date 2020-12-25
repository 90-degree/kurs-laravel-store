@extends('layouts.app')

@section('head-title', 'New Role')

@section('main-content')
  <h1>Create new Role</h1>
  <form action="/role/create" method="POST">
    @csrf
      <div class="mb-3">
          <input name="title" type="text" class="form-control" placeholder="Role title">
          @include('partials.error-message', ['field' => 'title'])
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@include('partials.successMessage')
@endsection