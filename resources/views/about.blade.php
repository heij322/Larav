@extends('layouts.app')

@section('content')
    <div class="hero-section">
        <h1>О нашем магазине</h1>
        <p style="font-size: 18px; color: #555;">Натуральные продукты напрямую от фермеров</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 40px;">
        <div class="product-card" style="text-align: left;">
            <h3 style="color: var(--primary-green);">Наша миссия</h3>
            <p>Мы верим, что каждый заслуживает доступа к чистым и натуральным продуктам. Мы объединили лучшие фермерские хозяйства, чтобы доставлять вам свежесть напрямую.</p>
            <p>Никаких посредников и долгих складских хранений — только польза и вкус.</p>
        </div>
        
        <div class="product-card" style="text-align: left; background-color: #f9fff5;">
            <h3 style="color: var(--primary-green);">Почему выбирают нас?</h3>
            <ul style="line-height: 2; padding-left: 20px;">
                <li>🥛 <strong>100% Натуральность</strong> — без консервантов.</li>
                <li>🚜 <strong>Прямые поставки</strong> — от фермера к столу.</li>
                <li>🚚 <strong>Быстрая доставка</strong> — сохраняем свежесть.</li>
                <li>❤️ <strong>Забота о клиентах</strong> — честный состав.</li>
            </ul>
        </div>
    </div>

    <div class="features">
        <div class="feature-item">
            <h1 style="color: var(--primary-green); font-size: 40px;">50+</h1>
            <p>Фермерских хозяйств</p>
        </div>
        <div class="feature-item">
            <h1 style="color: var(--primary-green); font-size: 40px;">2000+</h1>
            <p>Довольных клиентов</p>
        </div>
        <div class="feature-item">
            <h1 style="color: var(--primary-green); font-size: 40px;">100%</h1>
            <p>Натуральный продукт</p>
        </div>
    </div>

    <div class="product-card" style="text-align: center; margin-top: 20px;">
        <h3>Свяжитесь с нами</h3>
        <p>Телефон: 8 (800) 123-45-67</p>
        <p>Email: info@farmshop.ru</p>
    </div>
@endsection