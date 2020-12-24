@extends('layouts.app')

@section('head-title', 'New Product')

@section('main-content')
<h1>Add new Product</h1>
<form action="/product/create" method="POST">
  @csrf
    <div class="mb-3">
        <input name="name" type="text" class="form-control" placeholder="title">
        @include('partials.error-message', ['field' => 'name'])
    </div>
    <div class="mb-3">
        <label for="categories" class="form-label">Categories:</label>
        <select id="categories" class="form-select" name="categories[]" multiple>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @include('partials.error-message', ['field' => 'categories'])
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description:</label>
        <textarea name="description" type="text" class="form-control" name="description"></textarea>
        @include('partials.error-message', ['field' => 'description'])
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@include('partials.successMessage')
@endsection