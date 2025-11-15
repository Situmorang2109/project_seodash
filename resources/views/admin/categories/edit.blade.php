@extends('layouts.main')

@section('content')
<div class="card p-4">
    <h3 class="fw-bold mb-4">Edit Category</h3>

    <form method="POST" action="{{ route('admin.categories.update', $category->id) }}">
        @csrf @method('PUT')

        <label>Name</label>
        <input type="text" name="name" value="{{ $category->name }}" class="form-control mb-3">

        <button class="btn btn-primary">Update</button>
    </form>

</div>
@endsection
