@extends('layouts.main')

@section('content')

<h2>List Product</h2>

<div class="row">
@foreach($products as $p)
    <div class="col-md-4 mb-4">
        <div class="card p-3">
            <img src="{{ asset('storage/'.$p->image) }}" class="img-fluid mb-2">
            <h5>{{ $p->name }}</h5>
            <strong>{{ $p->price }}</strong>
            <p>Jumlah Stock: {{ $p->stock }}</p>
            <p>{{ $p->description }}</p>
        </div>
    </div>
@endforeach
</div>

@endsection
