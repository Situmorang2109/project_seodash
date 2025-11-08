@extends('layouts.main')

@section('content')

<h3>Edit Product</h3>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control">
            @foreach($categories as $c)
            <option value="{{ $c->id }}" {{ $c->id == $product->category_id ? 'selected' : '' }}>
                {{ $c->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Change Image</label>
        <input type="file" class="form-control" name="image">

        <img src="{{ asset('assets/images/products/' . $product->image) }}"
             width="120" class="mt-2 rounded">
    </div>

    <div class="mb-3">
        <label>Name</label>
        <input type="text" class="form-control" name="name" value="{{ $product->name }}">
    </div>

    <div class="mb-3">
        <label>Price</label>
        <input type="number" class="form-control" name="price" value="{{ $product->price }}">
    </div>

    <div class="mb-3">
        <label>Stock</label>
        <input type="number" class="form-control" name="stock" value="{{ $product->stock }}">
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea class="form-control" rows="4" name="description">{{ $product->description }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection
