@extends('layouts.main')

@section('content')
<div class="page-content">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">Dashboard</h3>
    </div>

    {{-- Welcome Card --}}
    <div class="card shadow-sm mb-4 border-0" style="border-radius: 12px;">
        <div class="card-body p-4">
            <h4 class="fw-bold mb-2">Selamat Datang, Admin 👋</h4>
            <p class="text-muted">
                Kelola data kategori, produk, dan transaksi dengan lebih mudah melalui panel admin SEODash.
            </p>
        </div>
    </div>

    {{-- Stats --}}
    <div class="row">

        {{-- Categories --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <span class="badge bg-primary rounded-circle p-3">
                            <i class="bi bi-tags fs-4"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Total Categories</h6>
                        <h4 class="fw-bold">{{ $totalCategories ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>

        {{-- Products --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <span class="badge bg-success rounded-circle p-3">
                            <i class="bi bi-box-seam fs-4"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Total Products</h6>
                        <h4 class="fw-bold">{{ $totalProducts ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>

        {{-- Transactions --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                <div class="card-body d-flex align-items-center">
                    <div class="me-3">
                        <span class="badge bg-info rounded-circle p-3">
                            <i class="bi bi-cash-coin fs-4"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="text-muted mb-0">Total Transactions</h6>
                        <h4 class="fw-bold">{{ $totalTransactions ?? 0 }}</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>


    {{-- Informational Section --}}
    <div class="card shadow-sm border-0" style="border-radius: 12px;">
        <div class="card-body p-4">

            <h4 class="fw-bold mb-3">Tentang SEODash</h4>
            <p class="text-muted">
                SEODash adalah sistem manajemen inventory sederhana yang dibuat untuk mempermudah pengelolaan data kategori,
                produk, dan transaksi dalam sebuah toko atau bisnis online.
            </p>

            <hr>

            <h5 class="fw-bold mt-3">Fitur Utama</h5>
            <ul>
                <li>Kelola data kategori dengan mudah</li>
                <li>Update & kelola stock produk</li>
                <li>Pencatatan transaksi otomatis</li>
                <li>Tampilan admin yang modern & user-friendly</li>
            </ul>

        </div>
    </div>

</div>
@endsection
