@extends('layout.app')

@section('title', 'Product changing')

@section('content')
    <div class="card">
        <div class="card-header">
            Product
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('products.update', $product->id) }}">
                @method('PUT')
                @csrf

                <div class="mb-3">
                    <label for="article" class="form-label">Name (article)</label>
                    <input type="text" class="form-control" name="article" id="article" value="{{ $product->article }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" >{{ $product->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" name="category" id="category" value="{{ $product->category }}">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" id="price" value="{{ $product->price }}">
                </div>

                <div class="mb-3">
                    <label for="picturesource" class="form-label">Picture source</label>
                    <input type="text" class="form-control" name="picturesource" id="picturesource" value="{{ $product->picturesource }}">
                </div>

                <button type="submit" class="btn btn-success">Apply</button>
                <a href="/shop">
                    <button type="button" class="btn btn-primary">Cancel</button>
                </a>
            </form>
        </div>
    </div>
@endsection
