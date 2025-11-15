@extends('layouts.main')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-3">Welcome, {{ auth()->user()->name }} 👋</h1>
    <p class="text-muted">You are logged in as <strong>{{ auth()->user()->role }}</strong>.</p>
</div>
@endsection
