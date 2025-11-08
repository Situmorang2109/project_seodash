@extends('layouts.main')

@section('content')
<h3 class="fw-bold mb-4">Daftar Transaksi</h3>

@if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Produk</th>
            <th>Tipe</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($transactions as $t)
        <tr>
            <td>{{ $loop->iteration }}</td>

            <td>{{ $t->name ?? '-' }}</td>

            <td>
                {{ $t->product->name ?? '-' }}

                @if($t->product)
                    <br>
                    <a href="{{ route('categories.show', $t->product->category_id) }}"
                       class="text-primary text-decoration-underline">
                       {{ $t->product->category->name }}
                    </a>
                @endif
            </td>

            <td>
                @if($t->type === 'in')
                    <span class="badge bg-primary">in</span>
                @else
                    <span class="badge bg-danger">out</span>
                @endif
            </td>

            <td>{{ $t->amount }}</td>

            <td>
                <form action="{{ route('transactions.destroy', $t->id) }}" method="POST"
                      onsubmit="return confirm('Yakin hapus transaksi ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center text-muted">Belum ada transaksi.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
