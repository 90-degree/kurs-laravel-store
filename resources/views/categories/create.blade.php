@extends('layouts.app')

@section('head-title', 'New Category')

@section('main-content')
  <h1>Create new Category</h1>
  <form action="/category/create" method="POST">
    @csrf
      <div class="mb-3">
          <input name="name" type="text" class="form-control" placeholder="Category name">
          @include('partials.error-message', ['field' => 'name'])
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@include('partials.successMessage')
@endsection