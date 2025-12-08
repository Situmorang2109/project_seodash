@extends('user.layouts.main')

@section('content')
<div class="container mt-4">
    <div class="card p-4 shadow-sm">
        <div class="row align-items-start">
            {{-- IMAGE --}}
            <div class="col-md-5 text-center">
                @if($product->image && file_exists(public_path('assets/images/products/' . $product->image)))
                    <img src="{{ asset('assets/images/products/' . $product->image) }}"
                         class="img-fluid rounded border"
                         style="max-height: 450px; object-fit: cover;">
                @else
                    <img src="{{ asset('assets/images/no-image.png') }}" class="img-fluid rounded border" style="max-height:450px; object-fit:cover;">
                @endif
            </div>

            {{-- INFO --}}
            <div class="col-md-7">
                <h3 class="fw-bold mb-2">{{ $product->name }}</h3>

                <p class="text-muted mb-1"><strong>Category:</strong> {{ $product->category->name ?? '-' }}</p>

                <h4 class="text-primary fw-bold mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>

                <p class="mb-3"><strong>Stock:</strong> {{ $product->stock }}</p>

                <hr>

                <div style="white-space: pre-line; line-height: 1.7;">
                    {{ $product->description }}
                </div>

                <div class="mt-4 d-flex gap-2">
                    <form action="{{ route('user.transactions.create') }}" method="GET">
                        {{-- You could pass product id as querystring to pre-select product in create --}}
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button class="btn btn-primary">Beli Sekarang</button>
                    </form>

                    <a href="{{ route('user.products.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
