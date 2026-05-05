@extends('admin.app')

@section('content')
    <h1>{{ isset($product) ? 'Редактировать товар' : 'Добавить товар' }}</h1>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
            <strong>Ошибки:</strong>
            <ul style="margin: 5px 0 0 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($product) ? route('admin.products.update', $product->id) : route('admin.products.store') }}" method="POST" enctype="multipart/form-data" style="background:white; padding:20px; max-width:500px;">
        @csrf
        @if(isset($product))
            @method('PUT')
        @endif

        <label>Название:</label><br>
        <!-- Добавил old() чтобы сохранять ввод -->
        <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" style="width:100%; margin-bottom:10px;" required><br>

        <label>Цена:</label><br>
        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price ?? '') }}" style="width:100%; margin-bottom:10px;" required><br>

        <label>Категория:</label><br>
        <select name="category_id" style="width:100%; margin-bottom:10px;">
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ (old('category_id', $product->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select><br>

        <label>Описание:</label><br>
        <textarea name="description" style="width:100%; height:100px; margin-bottom:10px;">{{ old('description', $product->description ?? '') }}</textarea><br>
        

        <button type="submit" class="btn btn-success">{{ isset($product) ? 'Сохранить изменения' : 'Добавить' }}</button>
    </form>
@endsection