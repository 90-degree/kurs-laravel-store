@extends('layouts.app')

@section('head-title', 'Welcome')

@section('main-content')
<ul class="list-group">
    @foreach ($products as $product)
        <li class="list-group-item">
            <a href="{{ route('products.show', compact('product')) }}">{{ $product->title }}</a>
            <p>{{ Str::substr($product->description, 0, 50) }}</p>
        </li>
    @endforeach
</ul>
@endsection