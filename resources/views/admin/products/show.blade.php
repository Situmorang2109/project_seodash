@extends('layouts.main')

@section('content')
<div class="page-content">

    <div class="card p-4 shadow-sm">
        <div class="row align-items-start">

            {{-- IMAGE --}}
            <div class="col-md-5 text-center">
                <img src="{{ asset('assets/images/products/' . $product->image) }}"
                     class="img-fluid rounded border"
                     style="max-height: 450px; object-fit: cover;">
            </div>

            {{-- PRODUCT INFO --}}
            <div class="col-md-7">

                <h3 class="fw-bold mb-2">{{ $product->name }}</h3>

                <p class="text-muted mb-1">
                    <strong>Category:</strong> {{ $product->category->name }}
                </p>

                <h4 class="text-primary fw-bold mb-3">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </h4>

                <p class="mb-3">
                    <strong>Stock:</strong> {{ $product->stock }}
                </p>

                <hr>

                <div style="white-space: pre-line; line-height: 1.7;">
                    {{ $product->description }}
                </div>

                <a href="{{ route('admin.products.index') }}" 
                   class="btn btn-secondary mt-3">
                    Kembali
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
