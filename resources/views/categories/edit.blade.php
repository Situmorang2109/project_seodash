@extends('layouts.main')

@section('content')

<div class="card">
    <div class="card-body">

        <h4 class="fw-bold mb-3">Edit Category</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control"
                       value="{{ $category->name }}" required>
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back</a>
        </form>

    </div>
</div>

@endsection
