@extends('layouts.main')

@section('content')
<div class="card p-4">

    <h4 class="fw-bold mb-3">Detail Category</h4>

    <h2 class="fw-bold text-primary">{{ $category->name }}</h2>

    <p class="text-muted" style="max-width: 650px;">
        Daftar produk yang termasuk dalam kategori ini.
    </p>

    <table class="table table-hover mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Stock</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($products as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->stock }}</td>
                <td>
                    <a href="{{ route('products.show', $p->id) }}"
                       class="btn btn-sm btn-primary">
                        Detail
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">Tidak ada produk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('transactions.index') }}" class="btn btn-info mt-3">Kembali</a>

</div>
@endsection
