<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    // ================================
    // INDEX (TAMPIL DATA)
    // ================================
    public function index()
    {
        $transactions = Transaction::with('product')->latest()->get();
        return view('admin.transactions.index', compact('transactions'));
    }

    // ================================
    // CREATE FORM
    // ================================
    public function create()
    {
        $products = Product::all();
        return view('admin.transactions.create', compact('products'));
    }

    // ================================
    // STORE DATA
    // ================================
    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required',
            'product_id' => 'required|exists:products,id',
            'type'       => 'required|in:in,out',
            'amount'     => 'required|numeric|min:1',
        ]);

        Transaction::create([
            'name'       => $request->name,
            'product_id' => $request->product_id,
            'type'       => $request->type,
            'amount'     => $request->amount,
        ]);

        return redirect()
            ->route('admin.transactions.index')
            ->with('success', 'Transaction berhasil ditambahkan');
    }

    // ================================
    // EDIT FORM
    // ================================
    public function edit(Transaction $transaction)
    {
        $products = Product::all();
        return view('admin.transactions.edit', compact('transaction', 'products'));
    }

    // ================================
    // UPDATE DATA
    // ================================
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'name'       => 'required',
            'product_id' => 'required|exists:products,id',
            'type'       => 'required|in:in,out',
            'amount'     => 'required|numeric|min:1',
        ]);

        $transaction->update([
            'name'       => $request->name,
            'product_id' => $request->product_id,
            'type'       => $request->type,
            'amount'     => $request->amount,
        ]);

        return redirect()
            ->route('admin.transactions.index')
            ->with('success', 'Transaction berhasil diupdate');
    }

    // ================================
    // DELETE DATA
    // ================================
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()
            ->route('admin.transactions.index')
            ->with('success', 'Transaction berhasil dihapus');
    }
}
