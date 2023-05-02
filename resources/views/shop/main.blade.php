@extends('layout.app')

@section('title', 'Shop')

@section('content')
    <form method="GET" action="{{ route('products.index') }}">
        @csrf
        <input type="text" class="form-control" name="search" id="search" placeholder="Search...">
        <button style="margin-top: 10px;" type="submit" class="btn-primary btn">Search</button>
    </form>
    <div style="width:100%;display:grid;grid-template-columns: 1fr 1fr 1fr;grid-column-gap: 10px;grid-row-gap: 10px">
        @foreach($products as $product)
            <div class="card" style="width: 100%;padding:20px;height: 600px;overflow-y: auto">
                <img src="{{ $product->picturesource }}" class="card-img-top" style="width:100%;height: 40%;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->article }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p class="card-text">Price: {{ $product->price }}$</p>
                    <a style="margin:10px 0 !important;" href ="{{ route('products.show', $product->id) }}" class = "btn btn-primary">Open</a>
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
        @endforeach
        @if (auth()->check() && auth()->user()->role == 'admin')
                <a href="{{ route('products.create') }}">
                    <div class="card" style="width: 100%;padding:20px;height: 600px;overflow-y: auto;display: flex;justify-content: center;align-items: center;border: 3px dodgerblue solid;cursor: pointer">
                        <p class="card-title" style="color:dodgerblue;font-size: 30px;font-weight: 600;text-align: center">+ Create new product</p>
                    </div>
                </a>
        @endif
    </div>
@endsection
