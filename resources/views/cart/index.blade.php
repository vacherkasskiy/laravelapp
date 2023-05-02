@extends('layout.app')

@section('title', 'Cart')

@section('content')

    @if(auth()->check())
        <div style="width:100%;height:50px;display: flex;flex-direction: row;align-items: center">
                @if(count($cart->getItems()) > 0)
                <p style="margin-right:20px;font-family: sans-serif;font-size: 16px;color:#333;">Total price: {{\Cart::getTotal()}}$</p>
                <form method="POST" action="/orders">
                    @csrf
                    <button type="submit" class="btn btn-primary">Create order</button>
                </form>
                @endif
        </div>
        <div style="width:100%;display:grid;grid-template-columns: 1fr 1fr 1fr 1fr 1fr;grid-column-gap: 10px;grid-row-gap: 10px">
            @forelse($cart->getItems() as $item)
                <div class="card" style="width: 100%;padding:20px;height: 500px;overflow-y: auto">
                    <img src="{{ \App\Models\Product::findOrFail($item->getId())->picturesource }}" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->getTitle() }}</h5>
                        <p class="card-text">{{ \App\Models\Product::findOrFail($item->getId())->description }}</p>
                        <p class="card-text">Price: {{ $item->getPrice() }}$</p>
                        <p class="card-text">Quantity: {{ $item->getQuantity() }}</p>
                        <form method="POST" action="{{ route('cart.removeItem') }}" style="margin-top: 20px">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="product_id" value="{{ $item->getId() }}">
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </div>
                </div>
            @empty
                <div style="width: 100%;height: 100%;display: flex;justify-content: center;align-items: center">
                    <h1 style="font-size:30px;color:red;">Your cart is empty</h1>
                </div>
            @endforelse
        </div>
    @else
    <div style="width: 100%;height: 100%;display: flex;justify-content: center;align-items: center">
        <h1 style="font-size:30px;color:red;">You don't have access to this section.</h1>
    </div>
    @endif
@endsection
