@extends('layouts.app')

@section('content')
    <div class="hero-section" style="text-align: left; padding: 30px;">
        <h1 style="margin-bottom: 10px;">Личный кабинет</h1>
        <p style="color: #666;">Добро пожаловать, {{ $user->name }}!</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 40px;">
        <div class="product-card" style="text-align: left; width: 193%;">
            <h3 style="margin-bottom: 15px; color: var(--primary-green);"><i class="fas fa-user-circle"></i> Мои данные</h3>
            <p><strong>Имя:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Дата регистрации:</strong> {{ $user->created_at->format('d.m.Y') }}</p>
        </div>
        
    </div>

    <h2 style="margin-bottom: 20px;"><i class="fas fa-history"></i> Мои заказы</h2>
    
    @if($orders->count() > 0)
        <div style="display: grid; gap: 15px;">
            @foreach($orders as $order)
                <div class="product-card" style="text-align: left; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
                    <div>
                        <h3 style="margin: 0;">Заказ #{{ $order->id }}</h3>
                        <p style="margin: 5px 0 0; color: #888; font-size: 14px;">
                            от {{ $order->created_at->format('d.m.Y H:i') }}
                        </p>
                    </div>
                    
                    <div style="text-align: right;">
                        <div style="font-weight: 800; font-size: 18px;">{{ $order->total }} ₽</div>
                        
                        @php
                            $statusClass = 'btn-outline';
                            $statusText = $order->status;

                            if ($order->status == 'new') {
                                $statusClass = 'btn-outline'; 
                                $statusText = 'Новый';
                            } elseif ($order->status == 'process') {
                                $statusClass = ''; 
                                $statusText = 'В обработке';
                                $statusClass = 'style="background: #3498db; color: white; padding: 5px 10px; border-radius: 20px;"';
                            } elseif ($order->status == 'done') {
                                $statusText = 'Выполнен';
                                $statusClass = 'style="background: #2ecc71; color: white; padding: 5px 10px; border-radius: 20px;"';
                            }
                        @endphp
                        
                        <span {{ $statusClass }}>{{ $statusText }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="product-card" style="text-align: center; color: #888;">
            <p>У вас пока нет заказов.</p>
            <a href="/catalog" class="btn">За покупками!</a>
        </div>
    @endif

    <div style="margin-top: 40px; text-align: center;">
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn" style="background: #e74c3c;">Выйти из аккаунта</button>
        </form>
    </div>
@endsection
