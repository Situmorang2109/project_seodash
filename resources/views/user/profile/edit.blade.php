@extends('layouts.main')

@section('content')

<h2>Update Profile</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form method="POST" action="{{ route('user.profile.update') }}">
    @csrf

    <label>Age</label>
    <input type="number" name="age" class="form-control" value="{{ $profile->age }}" required>

    <label>Biodata</label>
    <textarea name="biodata" class="form-control" required>{{ $profile->biodata }}</textarea>

    <button class="btn btn-primary mt-3">Submit</button>
</form>

@endsection
