<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // LIST PRODUCT (CARD VIEW)
    public function index()
    {
        $products = Product::with('category')->get();

        return view('admin.products.index', compact('products'));
    }

    // FORM CREATE
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // STORE PRODUCT
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);
    
        // Upload image
        $fileName = time() . '-' . $request->image->getClientOriginalName();
        $request->image->move(public_path('assets/images/products'), $fileName);
    
        // Save to database
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'price' => $request->price,
            'stock' => $request->stock,
            'description' => $request->description,
            'image' => $fileName
        ]);
    
        return redirect()->route('products.index')->with('success', 'Berhasil Tambah Produk!');
    }

    // FORM EDIT
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('product','categories'));
    }

    // UPDATE PRODUCT
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $product = Product::findOrFail($id);

        // Upload image jika ada
        if ($request->hasFile('image')) {
            $fileName = time() . '-' . $request->image->getClientOriginalName();
            $request->image->move(public_path('assets/images/products'), $fileName);
            $product->image = $fileName;
        }

        // Update data
        $product->update($request->except('image'));

        return redirect()->route('products.index')->with('success', 'Berhasil Update Produk!');
    }

    // DELETE PRODUCT
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Hapus file lama
        $path = public_path('assets/images/products/' . $product->image);
        if (file_exists($path)) {
            unlink($path);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Berhasil Hapus Produk!');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.products.show', compact('product'));
    }
}

