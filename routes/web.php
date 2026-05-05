<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', [MainController::class, 'index'])->name('home');

Route::get('/about', [MainController::class, 'about'])->name('about');

Route::get('/catalog', [MainController::class, 'catalog'])->name('catalog');

Route::get('/product/{id}', [MainController::class, 'product'])->name('product');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [MainController::class, 'cart'])->name('cart');
    
    // Новый роут для кнопки "В корзину" из каталога (GET)
    Route::get('/add-to-cart/{id}', [MainController::class, 'addToCart'])->name('cart.add.get');
    
    Route::post('/cart/add', [MainController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove', [MainController::class, 'removeFromCart'])->name('cart.remove');
    
    Route::post('/order', [MainController::class, 'createOrder'])->name('order.create');
    Route::get('/orders', [MainController::class, 'orders'])->name('orders');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/myself', [MainController::class, 'myself'])->middleware('auth')->name('myself');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::get('/products', [AdminController::class, 'products'])->name('products');
    Route::get('/products/create', [AdminController::class, 'createProduct'])->name('products.create');
    Route::post('/products', [AdminController::class, 'storeProduct'])->name('products.store');
    Route::get('/products/edit/{id}', [AdminController::class, 'editProduct'])->name('products.edit');
    Route::put('/products/update/{id}', [AdminController::class, 'updateProduct'])->name('products.update');
    Route::get('/products/delete/{id}', [AdminController::class, 'deleteProduct'])->name('products.delete');

    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
    Route::post('/orders/{id}', [AdminController::class, 'updateOrder'])->name('orders.update');
    Route::delete('/orders/delete/{id}', [AdminController::class, 'deleteOrder'])->name('orders.delete');
});