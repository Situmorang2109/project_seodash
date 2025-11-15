@extends('layouts.main')

@section('content')
<div class="page-content">

    <h3 class="fw-bold mb-3">Detail Category</h3>

    <h4>{{ $category->name }}</h4>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Stock</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($category->products as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->stock }}</td>
                <td>
                    <a href="{{ route('admin.products.show', $p->id) }}" class="btn btn-primary btn-sm">
                        Detail
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary mt-3">Kembali</a>

</div>
@endsection
