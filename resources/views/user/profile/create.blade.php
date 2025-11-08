@extends('layouts.main')

@section('content')

<h2>Buat Profile</h2>

<form method="POST" action="{{ route('user.profile.store') }}">
    @csrf

    <label>Age</label>
    <input type="number" name="age" class="form-control" required>

    <label>Biodata</label>
    <textarea name="biodata" class="form-control" required></textarea>

    <button class="btn btn-primary mt-3">Submit</button>
</form>

@endsection
