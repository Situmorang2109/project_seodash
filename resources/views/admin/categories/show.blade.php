@extends('layouts.main')

@section('content')
<div class="card p-4">
    <h3 class="fw-bold mb-3">Detail Category</h3>

    <p><strong>Name:</strong> {{ $category->name }}</p>

    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mt-3">Kembali</a>

</div>
@endsection
