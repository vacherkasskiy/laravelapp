@extends('layout.app')

@section('title', 'Карточка товара')

@section('content')
    <button class="btn btn-success">Создать товар</button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Категория</th>
            <th scope="col">Цена</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->article }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->price }}$</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}">
                        <button class="btn btn-primary btn-sm">Просмотреть</button>
                    </a>
                    <a href="{{ route('products.edit', $product->id) }}">
                        <button class="btn btn-info btn-sm">Изменить</button>
                    </a>
                    <form method="POST" action="{{ route('products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
