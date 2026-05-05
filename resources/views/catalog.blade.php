@extends('layouts.app')

@section('content')
    <h1 style="margin-bottom: 20px;">Каталог товаров</h1>
    
    <!-- Фильтр категорий -->
    <div style="margin-bottom: 30px; display: flex; gap: 10px; flex-wrap: wrap;">
        <a href="/catalog" class="btn btn-outline" style="{{ request()->get('category_id') ? '' : 'background: var(--primary-green); color: white; border-color: var(--primary-green);' }}">
            Все
        </a>
        @foreach($categories as $category)
            @php 
                $isActive = request()->get('category_id') == $category->id; 
            @endphp
            <a href="/catalog?category_id={{ $category->id }}" class="btn btn-outline" style="{{ $isActive ? 'background: var(--primary-green); color: white; border-color: var(--primary-green);' : '' }}">
                {{ $category->name }}
            </a>
        @endforeach
    </div>

    <div class="card-grid">
        @foreach($products as $product)
            <div class="product-card">
                <div class="product-img-placeholder">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="width:100%; height:100%; object-fit: cover; border-radius: 15px;">
                    @else
                        <i class="fas fa-box-open" style="color: #ddd;"></i>
                    @endif
                </div>
                
                <h3>{{ $product->name }}</h3>
                <div class="price">{{ $product->price }} ₽</div>
                
                <div style="display: flex; gap: 10px; justify-content: center;">
                    <a href="/product/{{ $product->id }}" class="btn btn-outline" style="font-size: 14px; padding: 8px 15px;">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection