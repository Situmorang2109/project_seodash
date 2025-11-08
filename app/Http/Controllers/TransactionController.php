<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Tampilkan daftar transaksi
    public function index()
    {
        $transactions = Transaction::with('product')->latest()->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    // Tampilkan form tambah transaksi
    public function create()
    {
        $products = Product::all();
        return view('admin.transactions.create', compact('products'));
    }

    // Simpan transaksi baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'amount' => 'required|numeric|min:1'
        ]);

        // Simpan transaksi
        Transaction::create([
            'name' => $request->name,
            'product_id' => $request->product_id,
            'type' => $request->type,
            'amount' => $request->amount,
        ]);

        return redirect()->route('transactions.index')
                         ->with('success', 'Data transaksi berhasil ditambahkan.');
    }

    // Hapus transaksi
    public function destroy($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->delete();

        return redirect()->route('transactions.index')
                         ->with('success', 'Transaksi berhasil dihapus.');
    }
}
