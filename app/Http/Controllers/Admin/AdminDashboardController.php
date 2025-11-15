<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'categoriesCount' => Category::count(),
            'productsCount' => Product::count(),
            'transactionsCount' => Transaction::count(),
        ]);
    }
}
