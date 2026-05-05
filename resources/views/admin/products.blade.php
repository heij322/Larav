@extends('admin.app')

@section('content')
    <h1>Товары</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-success">Добавить товар</a>
    <br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
        @foreach($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name ?? 'Нет' }}</td>
            <td>{{ $product->price }} руб.</td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn">Редактировать</a>
                <a href="{{ route('admin.products.delete', $product->id) }}" class="btn btn-danger" onclick="return confirm('Удалить?')">Удалить</a>
            </td>
        </tr>
        @endforeach
    </table>
@endsection