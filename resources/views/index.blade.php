@extends('layouts.app')

@section('content')
    <!-- Главный баннер -->
    <div class="hero-section">
        <h1>Свежие продукты с фермы</h1>
        <p style="color: #666; margin-bottom: 20px;">Доставляем натуральные продукты прямо к вашему столу</p>
        <a href="/catalog" class="btn">Перейти в каталог</a>
    </div>

    <!-- Преимущества -->
    <div class="features">
        <div class="feature-item">
            <i class="fas fa-seedling"></i>
            <h4>100% Натурально</h4>
            <p>Без ГМО и химии</p>
        </div>
        <div class="feature-item">
            <i class="fas fa-truck"></i>
            <h4>Доставка</h4>
            <p>Быстро и в срок</p>
        </div>
        <div class="feature-item">
            <i class="fas fa-hand-holding-heart"></i>
            <h4>С любовью</h4>
            <p>От фермеров</p>
        </div>
        <div class="feature-item">
            <i class="fas fa-medal"></i>
            <h4>Качество</h4>
            <p>Проверено ветеринаром</p>
        </div>
    </div>

    <!-- Секция популярных товаров -->
    <h2 style="margin-bottom: 20px; color: var(--text-color);">Популярные товары</h2>
    
    <div class="card-grid">
        @foreach($products as $product)
            <div class="product-card">
                <!-- БЛОК КАРТИНКИ (УБРАЛИ STORAGE) -->
                <div class="product-img-placeholder">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width:100%; height:100%; object-fit: cover; border-radius: 15px;">
                    @else
                        <i class="fas fa-carrot" style="color: #ddd;"></i>
                    @endif
                </div>
                
                <h3>{{ $product->name }}</h3>
                <p style="color: #888; font-size: 14px; height: 40px; overflow: hidden;">
                    {{ Str::limit($product->description, 50) }}
                </p>
                
                <div class="price">{{ $product->price }} ₽</div>
                
                <div style="display: flex; gap: 10px; justify-content: center;">
                    <a href="/product/{{ $product->id }}" class="btn btn-outline" style="font-size: 14px; padding: 8px 15px;">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection