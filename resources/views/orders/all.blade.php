@extends('layout.app')

@section('title', 'Orders')

@section('content')
    @if(auth()->check() && auth()->user()->role == 'admin')
        @if(count($orders) > 0)
            <div style="width:100%;display:grid;grid-template-columns: 1fr 1fr 1fr 1fr 1fr;grid-column-gap: 10px;grid-row-gap: 10px">
                @foreach($orders as $order)
                    <div class="card" style="width: 100%;padding:20px;height: 500px;overflow-y: auto">
                        <h5 class="card-title">Order #{{ $order->id }} made by {{ \App\Models\User::all()->where('id', '=', $order->user_id)->first()->name }} with id: {{ $order->user_id }}</h5>
                        @foreach(\App\Models\OrderProduct::all()->where('order_id', '=', $order->id) as $product)
                            <p class="card-text">{{ \App\Models\Product::all()->where('id', '=', $product->product_id)->first()->article }};
                                Amount: {{ $product->quantity }}</p>
                        @endforeach
{{--                        <form method="POST" action="/orders" style="margin-top: 20px">--}}
{{--                            @csrf--}}
{{--                            @method('DELETE')--}}
{{--                            <input type="hidden" name="id" id="id" value="{{ $order->id }}">--}}
{{--                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>--}}
{{--                        </form>--}}
                    </div>
                @endforeach
            </div>
        @else
            <div style="width: 100%;height: 100%;display: flex;justify-content: center;align-items: center">
                <h1 style="font-size:30px;color:red;">No orders were made</h1>
            </div>
        @endif
    @else
        <div style="width: 100%;height: 100%;display: flex;justify-content: center;align-items: center">
            <h1 style="font-size:30px;color:red;">You don't have access to this section.</h1>
        </div>
    @endif
@endsection
