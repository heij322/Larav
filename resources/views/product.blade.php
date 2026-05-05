@extends('layouts.app')

@section('content')
<div class="container">
    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 40px; max-width: 900px; margin: 0 auto;">
        <!-- Фото -->
        <div>
            @if($product->image)
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width: 100%; border-radius: 10px;">
            @else
                <div style="width: 100%; height: 300px; background: #f0f0f0; border-radius: 10px; display: flex; align-items: center; justify-content: center;">Нет фото</div>
            @endif
        </div>
        
        <!-- Информация -->
        <div>
            <h1>{{ $product->name }}</h1>
            <p style="color: #888; margin-bottom: 20px;">Категория: {{ $product->category->name ?? 'Без категории' }}</p>
            <p style="font-size: 28px; color: #6ab04c; font-weight: bold; margin-bottom: 20px;">{{ $product->price }} ₽</p>
            
            @if($product->description)
                <p style="margin-bottom: 20px; color: #555;">{{ $product->description }}</p>
            @endif
            
            @if(auth()->check())
                <form action="{{ route('cart.add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" style="background: #6ab04c; color: white; border: none; padding: 15px 40px; border-radius: 8px; cursor: pointer; font-size: 18px;">Добавить в корзину</button>
                </form>
            @else
                <div style="background: #f9f9f9; padding: 20px; border-radius: 8px; text-align: center;">
                    <p style="margin-bottom: 10px;">Для покупки необходимо авторизоваться</p>
                    <a href="{{ route('login') }}" style="display: inline-block; background: #6ab04c; color: white; padding: 12px 30px; border-radius: 8px; text-decoration: none;">Войти</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection