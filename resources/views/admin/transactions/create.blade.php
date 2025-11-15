@extends('layouts.main')

@section('content')

<div class="page-content">

    <h3 class="fw-bold mb-4">Tambah Transaksi</h3>

    <form action="{{ route('admin.transactions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Transaksi</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="product_id" class="form-label">Produk</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="">-- Pilih Produk --</option>
                @foreach($products as $p)
                    <option value="{{ $p->id }}">{{ $p->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipe Transaksi</label>
            <select name="type" id="type" class="form-control" required>
                <option value="in">In (Masuk)</option>
                <option value="out">Out (Keluar)</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Jumlah</label>
            <input type="number" name="amount" id="amount" class="form-control" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>

        <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>

</div>

@endsection
