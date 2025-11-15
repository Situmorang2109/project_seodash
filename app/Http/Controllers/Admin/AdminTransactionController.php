<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->get();

        return view('admin.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();

        return view('admin.transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'product_id' => 'required',
            'type' => 'required|in:in,out',
            'amount' => 'required|numeric|min:1',
        ]);

        // SIMPAN TRANSAKSI
        Transaction::create([
            'name' => $request->name,
            'product_id' => $request->product_id,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);

        // UPDATE STOCK
        $product = Product::find($request->product_id);

        if ($request->type == 'in') {
            $product->stock += $request->amount;
        } else {
            $product->stock -= $request->amount;
        }

        $product->save();

        return redirect()->route('admin.transactions.index')
                         ->with('success', 'Transaksi berhasil ditambahkan!');
    }
}
