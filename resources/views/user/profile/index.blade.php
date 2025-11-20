@extends('user.layouts.main')

@section('content')
<h2 class="fw-bold mb-3">My Profile</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($profile)
    <p><strong>Age:</strong> {{ $profile->age }}</p>
    <p><strong>Biodata:</strong> {{ $profile->biodata }}</p>

    <a href="{{ route('user.profile') }}" class="btn btn-primary">Update Profile</a>
@else
    <form action="{{ url('user/profile') }}" method="POST">
        @csrf

        <label>Age</label>
        <input type="number" name="age" class="form-control mb-2">

        <label>Biodata</label>
        <textarea name="biodata" class="form-control mb-2"></textarea>

        <button class="btn btn-primary">Save</button>
    </form>
@endif

@endsection
