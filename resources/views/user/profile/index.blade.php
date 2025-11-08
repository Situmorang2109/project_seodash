@extends('layouts.main')

@section('content')

<h2>Update Profile</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($profile)
    <p><strong>Age:</strong> {{ $profile->age }}</p>
    <p><strong>Biodata:</strong> {{ $profile->biodata }}</p>

    <a href="{{ route('user.profile.edit') }}" class="btn btn-primary">Update Profile</a>
@else
    <a href="{{ route('user.profile.create') }}" class="btn btn-primary">Buat Profile</a>
@endif

@endsection
