@extends('layouts.main')

@section('content')

<div class="card shadow-sm p-4">

    <div class="row">
        
        {{-- ===================== --}}
        {{-- BAGIAN GAMBAR PRODUK --}}
        {{-- ===================== --}}
        <div class="col-md-5">
            <img src="{{ asset('assets/images/products/' . $product->image) }}"
                 class="img-fluid rounded"
                 style="height: 350px; object-fit: cover;">
        </div>

        {{-- ===================== --}}
        {{-- BAGIAN INFORMASI --}}
        {{-- ===================== --}}
        <div class="col-md-7">

            <h2 class="fw-bold">{{ $product->name }}</h2>

            <h4 class="text-primary fw-bold mt-2">
                Rp {{ number_format($product->price) }}
            </h4>

            <p class="text-muted mt-1">
                <strong>Stok:</strong> {{ $product->stock }}
            </p>

            <hr>

            <h5 class="fw-bold">Description</h5>
            <p style="font-size: 15px;">
                {{ $product->description }}
            </p>

            <div class="mt-4 d-flex gap-2">

                <a href="{{ route('products.edit', $product->id) }}" 
                   class="btn btn-warning">
                    Edit
                </a>

                <form action="{{ route('products.destroy', $product->id) }}" 
                    method="POST" 
                    onsubmit="return confirm('Yakin hapus produk ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>


                <a href="{{ route('products.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </div>

        </div>
    </div>

</div>

@endsection
