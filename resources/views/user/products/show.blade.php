@extends('layouts.main')

@section('content')

<div class="container">

    <div class="card p-4 shadow-sm" style="border-radius: 14px;">

        <div class="row">

            {{-- PRODUCT IMAGE --}}
            <div class="col-md-5 text-center">
                <img src="{{ asset('assets/images/products/' . $product->image) }}"
                class="img-fluid rounded border"
                style="max-height: 450px; width:100%; object-fit: cover;">
            </div>

            {{-- PRODUCT INFO --}}
            <div class="col-md-7">

                <h2 class="fw-bold mb-2">{{ $product->name }}</h2>

                <p class="text-muted mb-2">
                    Category: 
                    <span class="fw-semibold">
                        {{ $product->category->name ?? 'No Category' }}
                    </span>
                </p>

                <h4 class="text-primary fw-bold mb-4">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </h4>

                <p class="mb-4" style="line-height: 1.6;">
                    {{ $product->description }}
                </p>

                <a href="{{ route('user.transactions.create') }}" class="btn btn-primary px-4 py-2">
                    Beli Sekarang
                </a>

            </div>

        </div>

    </div>

</div>

@endsection
