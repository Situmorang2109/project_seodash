@extends('layouts.main')

@section('content')
<div class="page-content">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold">List Product</h3>

        <a href="{{ route('admin.products.create') }}" class="btn btn-primary rounded-pill px-4">
            Tambah
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($products as $p)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm p-3 h-100">

                    <img src="/assets/images/products/{{ $p->image }}"
                         class="img-fluid rounded mb-3"
                         style="width: 100%; height: 250px; object-fit: cover;">

                    <h5 class="fw-bold">
                        {{ Str::limit($p->name, 40) }}
                    </h5>

                    <h6 class="text-primary fw-bold">Rp {{ number_format($p->price,0,',','.') }}</h6>

                    <p class="text-muted mb-0">Jumlah Stock: {{ $p->stock }}</p>

                    <p class="small mt-2">{{ Str::limit($p->description, 80) }}</p>

                    <a href="{{ route('admin.products.show', $p->id) }}" class="btn btn-primary w-100 mt-3">Read More</a>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('admin.products.edit', $p->id) }}" class="btn btn-warning w-50 me-2">Edit</a>

                        <form action="{{ route('admin.products.destroy', $p->id) }}" method="POST" class="w-50">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger w-100">Delete</button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
