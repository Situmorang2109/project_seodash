<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\UserTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTransactionController extends Controller
{
    public function index()
    {
        $transactions = UserTransaction::where('user_id', Auth::id())
            ->with('product')
            ->latest()
            ->get();

        return view('user.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $products = Product::all();
        return view('user.transactions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'type' => 'required',
            'amount' => 'required|numeric',
            'notes' => 'nullable'
        ]);

        UserTransaction::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'type' => $request->type,
            'amount' => $request->amount,
            'notes' => $request->notes,
        ]);

        return redirect()->route('user.transactions')
            ->with('success', 'Transaction Berhasil!');
    }
}
