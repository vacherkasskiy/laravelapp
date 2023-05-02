@extends('layout.app')

@section('title', 'New product creation')

@section('content')
    <div class="card">
        <div class="card-header">
            New product creation
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('products.store') }}">
                <!-- без данного тега не будет работать !!! -->
                @csrf
                <div class="mb-3">
                    <label for="article" class="form-label">Name (article)</label>
                    <input type="text" class="form-control" name="article" id="article">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" name="category" id="category">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" name="price" id="price">
                </div>

                <div class="mb-3">
                    <label for="picturesource" class="form-label">Picture source</label>
                    <input type="text" class="form-control" name="picturesource" id="picturesource">
                </div>

                <button type="submit" class="btn btn-success">Create</button>
                <a href="/shop">
                    <button type="button" class="btn btn-primary">Cancel</button>
                </a>
            </form>
        </div>
    </div>
@endsection
