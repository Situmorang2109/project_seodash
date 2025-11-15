<?php
namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Product;

class UserProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('user.products.index', compact('products')); // pastikan folder user.products.index
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('user.products.show', compact('product'));
    }
}
