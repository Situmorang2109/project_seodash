@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h2>List Product</h2>

    <div class="row">
        @foreach($products as $p)
        <div class="col-md-4 mb-4">
            <div class="card p-3">
                <img src="{{ asset('assets/images/products/' . $p->image) }}" class="img-fluid mb-2">
                <h5>{{ $p->name }}</h5>
                <strong>Rp {{ number_format($p->price) }}</strong>
                <p>Stock: {{ $p->stock }}</p>
                <p>{{ Str::limit($p->description, 100) }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
