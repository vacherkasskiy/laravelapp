@extends('layout.app')

@section('title', 'Product page')

@section('content')

    <div class="card" style="width: 80%;padding:20px;height: fit-content;overflow-y: auto">
        <img src="{{ $product->picturesource }}" class="card-img-top" style="width:100%;height: 80%;">
        <div class="card-body">
            <h5 class="card-title">{{ $product->article }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">Price: {{ $product->price }}$</p>
            @if(auth()->check() && auth()->user()->role == 'admin')
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit product</a>
                <form method="POST" action="{{ route('products.destroy', $product->id) }}" style="margin-top: 20px">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            @else
                @if(auth()->check())
                    <form method="POST" action="{{ route('cart.put') }}">
                        @csrf
                        @method("PUT")
                        <input type="hidden" name="product_id" value="{{ $product->id }}"/>
                        <button type="submit" class="btn btn-primary">Add to a shopping cart</button>
                    </form>
                @else
                    <p class="card-text" style="font-size: 10px;color:red">You have to be authorized to interact with products</p>
                @endif
            @endif
        </div>
    </div>

@endsection
