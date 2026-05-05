@extends('layouts.app')

@section('content')
    <h1 style="margin-bottom: 30px;">Оформление заказа</h1>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px; flex-wrap: wrap;">
        
        <!-- Форма данных -->
        <div class="product-card" style="background: white; text-align: left;">
            <h3 style="margin-bottom: 20px; color: var(--primary-green);">Данные получателя</h3>
            
            <form action="/create-order" method="POST">
                @csrf
                
                <label>Ваше имя</label>
                <input type="text" name="customer_name" placeholder="Иван Иванов" required 
                       style="width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #eee; border-radius: 10px; box-sizing: border-box; font-family: inherit;">
                
                <label>Телефон</label>
                <input type="text" name="phone" placeholder="+7 (999) 123-45-67" required 
                       style="width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #eee; border-radius: 10px; box-sizing: border-box; font-family: inherit;">
                
                <label>Адрес доставки</label>
                <textarea name="address" placeholder="Город, Улица, Дом, Квартира" required 
                          style="width: 100%; padding: 12px; margin-bottom: 15px; border: 1px solid #eee; border-radius: 10px; height: 80px; resize: none; font-family: inherit;"></textarea>

                <button type="submit" class="btn" style="width: 100%; font-size: 18px; padding: 15px;">
                    Подтвердить заказ
                </button>
            </form>
        </div>

        <!-- Сводка заказа -->
        <div>
            <div class="product-card" style="background: #f9fff5;">
                <h3 style="margin-bottom: 20px;">Ваш заказ</h3>
                
                @php $total = 0; @endphp
                @foreach(session('cart') as $item)
                    <div style="display: flex; justify-content: space-between; margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px dashed #eee;">
                        <span>{{ $item['name'] }} <span style="color:#888;">x{{ $item['qty'] }}</span></span>
                        <span style="font-weight: 600;">{{ $item['price'] * $item['qty'] }} ₽</span>
                    </div>
                    @php $total += $item['price'] * $item['qty']; @endphp
                @endforeach

                <div style="margin-top: 20px; display: flex; justify-content: space-between; font-size: 20px; font-weight: 800;">
                    <span>Итого:</span>
                    <span style="color: var(--primary-green);">{{ $total }} ₽</span>
                </div>
            </div>

        </div>
    </div>
@endsection