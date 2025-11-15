@extends('user.layouts.main')

@section('content')
<div class="container mt-4">

    <h3 class="fw-bold mb-3">Daftar Transaksi Anda</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('user.transactions.create') }}" class="btn btn-primary mb-3">
        Input Transaction
    </a>

    <div class="card">
        <div class="card-body">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Notes</th>
                        <th>Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($transactions as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ auth()->user()->name }}</td>
                        <td>{{ $t->product->name ?? '-' }}</td>

                        <td>
                            @if($t->type == 'in')
                                <span class="badge bg-primary">In</span>
                            @else
                                <span class="badge bg-danger">Out</span>
                            @endif
                        </td>

                        <td>{{ $t->amount }}</td>
                        <td>{{ $t->notes ?? '-' }}</td>
                        <td>{{ $t->created_at->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada transaksi</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

</div>
@endsection
