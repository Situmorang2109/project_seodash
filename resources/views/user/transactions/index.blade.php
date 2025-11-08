@extends('layouts.main')

@section('content')

<h2>Tampil Transaction</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<a href="{{ route('user.transactions.create') }}" class="btn btn-primary mb-3">Input Transaction</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Product</th>
            <th>Type(In Out)</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        @forelse($transactions as $t)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ auth()->user()->name }}</td>
            <td>{{ $t->product->name }}</td>
            <td>
                @if($t->type == 'in')
                    <span class="badge bg-primary">in</span>
                @else
                    <span class="badge bg-danger">out</span>
                @endif
            </td>
            <td>{{ $t->amount }}</td>
        </tr>
        @empty
        <tr><td colspan="5">Belum ada transaksi</td></tr>
        @endforelse
    </tbody>
</table>

@endsection
