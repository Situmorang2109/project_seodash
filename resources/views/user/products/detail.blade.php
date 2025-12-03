<!-- resources/views/user/products/detail.blade.php -->
@extends('user.layouts.main')

@section('content')
<div class="container py-4">
    <div class="row g-4">
        <!-- LEFT: Gallery -->
        <div class="col-md-5">
            <div class="card shadow-sm rounded-3 p-3 text-center">
                <img id="mainImage" src="{{ asset('uploads/' . $product->image) }}" alt="Product"
                     class="img-fluid rounded mb-3" style="max-height: 420px; object-fit: cover;">

                <!-- Thumbnail List -->
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <img src="{{ asset('uploads/' . $product->image) }}" class="thumb img-thumbnail rounded"
                         style="width:70px; height:70px; object-fit:cover; cursor:pointer;">
                    @if($product->image2)
                    <img src="{{ asset('uploads/' . $product->image2) }}" class="thumb img-thumbnail rounded"
                         style="width:70px; height:70px; object-fit:cover; cursor:pointer;">
                    @endif
                    @if($product->image3)
                    <img src="{{ asset('uploads/' . $product->image3) }}" class="thumb img-thumbnail rounded"
                         style="width:70px; height:70px; object-fit:cover; cursor:pointer;">
                    @endif
                </div>
            </div>
        </div>

        <!-- RIGHT: Details -->
        <div class="col-md-7">
            <h3 class="fw-bold">{{ $product->name }}</h3>
            <p class="text-muted">{{ $product->category->name ?? '' }}</p>

            <h4 class="text-primary fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>
            <p class="text-muted">Stock: {{ $product->stock }}</p>

            <hr>

            <h5 class="fw-semibold mb-2">Deskripsi Produk</h5>
            <p style="white-space: pre-line;">{{ $product->description }}</p>

            <div class="mt-4 d-flex gap-2">
                <a href="{{ route('user.products.index') }}" class="btn btn-secondary px-4">Kembali</a>
                <a href="{{ route('user.transactions.create', ['product' => $product->id]) }}"
                   class="btn btn-primary px-4">Beli Sekarang</a>
            </div>
        </div>
    </div>
</div>

<script>
// Thumbnail click logic
const thumbs = document.querySelectorAll('.thumb');
const mainImage = document.getElementById('mainImage');

thumbs.forEach(t => {
    t.addEventListener('click', () => {
        mainImage.src = t.src;
    });
});
</script>
@endsection
