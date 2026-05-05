@extends('admin.app')

@section('content')
    <h1>Панель управления</h1>
    <p>Заказов: {{ $ordersCount }}</p>
    <p>Товаров: {{ $productsCount }}</p>
@endsection