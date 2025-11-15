@extends('layouts.main')

@section('content')
<div class="page-content">
    <h3 class="fw-bold mb-4">Tambah Product</h3>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Category</label>
        <select name="category_id" class="form-control mb-3">
            <option value="">--Select a Category--</option>
            @foreach($categories as $c)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
        </select>

        <label>Image</label>
        <input type="file" name="image" class="form-control mb-3">

        <label>Name</label>
        <input type="text" name="name" class="form-control mb-3">

        <label>Price</label>
        <input type="number" name="price" class="form-control mb-3">

        <label>Stock</label>
        <input type="number" name="stock" class="form-control mb-3">

        <label>Description</label>
        <textarea name="description" class="form-control mb-3" rows="5"></textarea>

        <button class="btn btn-primary px-4">Submit</button>
    </form>
</div>
@endsection
