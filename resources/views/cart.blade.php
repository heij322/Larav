@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Корзина</h1>
    
    @if(!auth()->check())
        <div class="alert alert-warning" style="background: #fff3cd; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #ffc107;">
            Для оформления заказа необходимо 
            <a href="{{ route('login') }}" style="color: #6ab04c; font-weight: bold;">войти</a> или 
            <a href="{{ route('register') }}" style="color: #6ab04c; font-weight: bold;">зарегистрироваться</a>
        </div>
    @endif

    @if(session('cart') && count(session('cart')) > 0)
        <div class="cart-items">
            @php $total = 0; @endphp
            @foreach(session('cart') as $id => $item)
                <div class="cart-item" style="display: flex; align-items: center; gap: 20px; padding: 15px; border-bottom: 1px solid #eee;">
                    @if($item['image'])
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}" style="width: 80px; height: 80px; object-fit: cover; border-radius: 8px;">
                    @else
                        <div style="width: 80px; height: 80px; background: #f0f0f0; border-radius: 8px;"></div>
                    @endif
                    <div style="flex: 1;">
                        <h3 style="margin: 0 0 5px;">{{ $item['name'] }}</h3>
                        <p style="margin: 0; color: #6ab04c; font-weight: bold;">{{ $item['price'] }} ₽</p>
                    </div>
                    <span>Кол-во: {{ $item['quantity'] }}</span>
                    @if(auth()->check())
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $id }}">
                            <button type="submit" style="background: #e74c3c; color: white; border: none; padding: 8px 12px; border-radius: 5px; cursor: pointer;">Удалить</button>
                        </form>
                    @endif
                </div>
                @php $total += $item['price'] * $item['quantity']; @endphp
            @endforeach
        </div>
        
        <div class="cart-total" style="text-align: right; padding: 20px; font-size: 20px; font-weight: bold;">
            Итого: {{ $total }} ₽
        </div>
        
        @if(auth()->check())
            <form action="{{ route('order.create') }}" method="POST" style="max-width: 400px; margin-top: 20px;">
                @csrf
                <h3>Оформление заказа</h3>
                <div style="margin-bottom: 15px;">
                    <label>Ваше имя:</label><br>
                    <input type="text" name="customer_name" value="{{ auth()->user()->name }}" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 15px;">
                    <label>Телефон:</label><br>
                    <input type="text" name="phone" required placeholder="+7 (999) 123-45-67" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                </div>
                <button type="submit" class="btn" style="background: #6ab04c; color: white; padding: 12px 30px; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">
                    Оформить заказ
                </button>
            </form>
        @else
            <div style="margin-top: 20px; padding: 20px; background: #f9f9f9; border-radius: 8px; text-align: center;">
                <p>Чтобы оформить заказ, пожалуйста авторизуйтесь.</p>
                <a href="{{ route('login') }}" class="btn" style="display: inline-block; background: #6ab04c; color: white; padding: 12px 30px; border-radius: 5px; text-decoration: none;">Войти</a>
            </div>
        @endif
    @else
        <div style="text-align: center; padding: 40px;">
            <h2>Корзина пуста</h2>
            <p>Добавьте товары из <a href="{{ route('catalog') }}" style="color: #6ab04c;">каталога</a></p>
        </div>
    @endif
</div>
@endsection