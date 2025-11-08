@extends('user.layouts.main')

@section('content')
<h3 class="fw-bold mb-4">Detail Product</h3>

<div class="card p-4">
    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('storage/' . $product->image) }}" 
                 class="img-fluid rounded" alt="Product">
        </div>

        <div class="col-md-8">
            <h4>{{ $product->name }}</h4>
            <p class="text-muted">{{ $product->category->name }}</p>

            <h5 class="fw-bold text-primary">Rp {{ number_format($product->price,0,',','.') }}</h5>
            <p>Stock: {{ $product->stock }}</p>

            <hr>

            <p>{{ $product->description }}</p>

            <a href="{{ route('user.products.index') }}" class="btn btn-secondary mt-3">
                Kembali
            </a>
        </div>
    </div>
</div>
@endsection
