<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('product')->latest()->get();
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
            'name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'amount' => 'required|numeric|min:1'
        ]);

        Transaction::create([
            'name' => $request->name,
            'product_id' => $request->product_id,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);

        return redirect()->route('admin.transactions.index')
                         ->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('admin.transactions.index')
                         ->with('success', 'Transaksi berhasil dihapus.');
    }
}
