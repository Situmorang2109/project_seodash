@extends('layouts.main')

@section('content')
<div class="page-content">
    <h3 class="fw-bold mb-4">Edit Product</h3>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Category</label>
        <select name="category_id" class="form-control mb-3">
            @foreach($categories as $c)
                <option value="{{ $c->id }}" {{ $product->category_id == $c->id ? 'selected' : '' }}>
                    {{ $c->name }}
                </option>
            @endforeach
        </select>

        <label>Change Image</label>
        <input type="file" name="image" class="form-control mb-3">

        <label>Name</label>
        <input type="text" name="name" class="form-control mb-3" value="{{ $product->name }}">

        <label>Price</label>
        <input type="number" name="price" class="form-control mb-3" value="{{ $product->price }}">

        <label>Stock</label>
        <input type="number" name="stock" class="form-control mb-3" value="{{ $product->stock }}">

        <label>Description</label>
        <textarea name="description" class="form-control mb-3" rows="5">{{ $product->description }}</textarea>

        <button class="btn btn-primary px-4">Update</button>
    </form>
</div>
@endsection
