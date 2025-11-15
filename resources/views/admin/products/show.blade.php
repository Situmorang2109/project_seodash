@extends('layouts.main')

@section('content')
<div class="page-content">

    <div class="card p-4 shadow-sm">
        <div class="row">

            <div class="col-md-4">
                <img src="{{ asset('assets/images/products/'.$product->image) }}">

            </div>

            <div class="col-md-8">
                <h3 class="fw-bold">{{ $product->name }}</h3>

                <p class="text-muted">{{ $product->category->name }}</p>

                <h4 class="text-primary fw-bold">Rp {{ number_format($product->price,0,',','.') }}</h4>

                <p>Stock: {{ $product->stock }}</p>

                <hr>

                <p>{{ $product->description }}</p>

                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary mt-3">
                    Kembali
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
