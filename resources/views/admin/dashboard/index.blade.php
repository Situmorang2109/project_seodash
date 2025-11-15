@extends('layouts.main')

@section('content')
<div class="page-content">

    <h2 class="fw-bold mb-4">Dashboard</h2>

    <!-- Cards Summary -->
    <div class="row">

        <!-- Categories -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4 p-4" style="background: #EEF4FF;">
                <h5 class="fw-bold text-primary">Total Categories</h5>
                <h2 class="fw-bold mt-3">{{ $categoriesCount }}</h2>
            </div>
        </div>

        <!-- Products -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4 p-4" style="background: #E9FFF4;">
                <h5 class="fw-bold text-success">Total Products</h5>
                <h2 class="fw-bold mt-3">{{ $productsCount }}</h2>
            </div>
        </div>

        <!-- Transactions -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4 p-4" style="background: #FFF4E6;">
                <h5 class="fw-bold text-warning">Total Transactions</h5>
                <h2 class="fw-bold mt-3">{{ $transactionsCount }}</h2>
            </div>
        </div>

    </div>

    <!-- Welcome Section -->
    <div class="card shadow-sm border-0 rounded-4 p-5 mt-4">
        <h3 class="fw-bold mb-3">Welcome Back, Admin 👋</h3>
        <p class="text-muted">
            Ini adalah dashboard aplikasi inventory kamu.  
            Kamu bisa mengelola categories, products, dan transactions dengan mudah 🙂
        </p>
    </div>

</div>
@endsection
