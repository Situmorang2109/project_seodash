@extends('layouts.main')

@section('content')
<div class="card p-4">
    <h3 class="fw-bold mb-4">Tambah Category</h3>

    <form method="POST" action="{{ route('admin.categories.store') }}">
        @csrf

        <label>Name</label>
        <input type="text" name="name" class="form-control mb-3">

        <button class="btn btn-primary">Submit</button>
    </form>

</div>
@endsection
