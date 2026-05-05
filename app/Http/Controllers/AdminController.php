<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $ordersCount = Order::count();
        $productsCount = Product::count();
        return view('admin.index', compact('ordersCount', 'productsCount'));
    }

    public function products() {
        $products = Product::with('category')->get();
        return view('admin.products', compact('products'));
    }

    public function createProduct() {
        $categories = Category::all();
        return view('admin.product_form', compact('categories'));
    }

    public function storeProduct(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['image'] = 'images/' . $filename;
        }

        Product::create($data);
        return redirect()->route('admin.products')->with('success', 'Товар добавлен');
    }

    public function editProduct($id) {
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.product_form', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, $id) {
        $data = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $product = Product::find($id);

        if ($request->hasFile('image')) {

            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['image'] = 'images/' . $filename;
        }

        $product->update($data);
        return redirect()->route('admin.products')->with('success', 'Товар обновлен');
    }

    public function deleteProduct($id) {
        Product::destroy($id);
        return back()->with('success', 'Товар удален');
    }

    public function orders() {
        $orders = Order::latest()->get();
        return view('admin.orders', compact('orders'));
    }

    public function updateOrder(Request $request, $id) {
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        return back()->with('success', 'Статус обновлен');
    }
    public function deleteOrder($id) {
        Order::destroy($id);
        return back()->with('success', 'Заказ удален');
    }
}