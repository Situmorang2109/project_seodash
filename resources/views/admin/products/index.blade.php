@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-between mb-4">
    <h3>List Product</h3>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Tambah</a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    @foreach($products as $item)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm">

            <img src="{{ asset('assets/images/products/' . $item->image) }}"
                 class="card-img-top"
                 height="250"
                 style="object-fit: cover">

            <div class="card-body">

                <h5>{{ $item->name }}</h5>

                <p class="text-primary fw-bold">
                    Rp {{ number_format($item->price) }}
                </p>

                <p class="text-muted">Stock: {{ $item->stock }}</p>

                <p class="text-muted" style="font-size: 14px;">
                    {{ Str::limit($item->description, 120) }}
                </p>

                {{-- READ MORE BUTTON --}}
                <a href="{{ route('products.show', $item->id) }}" 
                   class="btn btn-primary w-100 mb-3">
                    Read More
                </a>

                {{-- EDIT + DELETE BUTTON (Fixed version) --}}
                <div class="d-flex gap-2">
                    <a href="{{ route('products.edit', $item->id) }}" 
                       class="btn btn-warning w-50">
                        Edit
                    </a>

                    <form action="{{ route('products.destroy', $item->id) }}" 
                          method="POST" 
                          class="w-50"
                          onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger w-100">
                            Delete
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection
