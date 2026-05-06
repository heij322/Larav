<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    // Личный кабинет
    public function myself() {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->latest()->get(); 
        return view('myself', compact('user', 'orders'));
    }

    // Страница "О нас"
    public function about() {
        return view('about');
    }

    // Главная страница
    public function index() {
        $products = Product::latest()->take(4)->get();
        return view('index', compact('products'));
    }

    // Каталог
    public function catalog(Request $request) {
        $categories = Category::all();
        
        if ($request->category_id) {
            $products = Product::where('category_id', $request->category_id)->get();
        } else {
            $products = Product::all();
        }
        
        return view('catalog', compact('products', 'categories'));
    }

    // Карточка товара
    public function product($id) {
        $product = Product::find($id);
        return view('product', compact('product'));
    }

    // Страница корзины
    public function cart() {
        $cart = session()->get('cart', []);
        $total = 0;
        
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        return view('cart', compact('cart', 'total'));
    }

    // Добавить в корзину
    public function addToCart($id) {
        $product = Product::find($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'qty' => 1,
                'image' => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Товар добавлен в корзину!');
    }

    // Удалить из корзины
    public function removeFromCart($id) {
        $cart = session()->get('cart', []);
        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->back()->with('success', 'Товар удален из корзины');
    }

    // Страница оформления заказа
    public function checkout() {
        return view('checkout');
    }

    // Создание заказа
    public function createOrder(Request $request) {
        $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'address' => 'required'
        ]);

        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }

        Order::create([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $total,
            'status' => 'new',
            'user_id' => auth()->id() 
        ]);

        session()->forget('cart');

        return redirect('/')->with('success', 'Заказ успешно оформлен!');
    }
}
