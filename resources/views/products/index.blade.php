@extends('layouts.app')

@section('head-title', 'Welcome')

@section('main-content')
<ul class="list-group">
    @foreach ($products as $product)
        <div class="list-group">
            <div class="list-group-item">
                <h4 class="card-title">{{ $product->name }}</h4>
                <hr>
                <h6 class="card-subtitle mb-2 text-muted">
                    @foreach ($product->categories as $category)
                        <span>{{ $category->name }}</span>
                    @endforeach
                </h6>
                <p class="card-text">{{ $product->description }}</p>
                <a href="{{ route('products.edit', compact('product')) }}">Edit</a>
            </div>
        </div>
    @endforeach
    {{ $products->links() }}
</ul>
@endsection