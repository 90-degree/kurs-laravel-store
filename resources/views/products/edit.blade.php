@extends('layouts.app')

@section('head-title', 'Edit ' . $product->title)

@section('main-content')
<h1>Edit product</h1>
<form action="{{ route('products.update', compact('product')) }}" method="POST">
  @csrf
    <div class="mb-3">
        <input name="name" type="text" class="form-control" placeholder="title" value="{{ $product->name }}">
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
        <textarea name="description" type="text" class="form-control" name="description">{{ $product->description }}</textarea>
        @include('partials.error-message', ['field' => 'description'])
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="isAvailable" value="{{ $product->isAvailable }}" checked="{{ !!$product->isAvailable ?? false}}" name="isAvailable">
        <label class="form-check-label" for="isAvailable">Is available</label>
      </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@include('partials.successMessage')
@endsection