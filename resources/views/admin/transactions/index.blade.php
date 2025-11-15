@extends('layouts.main')

@section('content')
<div class="card shadow-sm p-4">

    <h4 class="fw-bold mb-4">Tampil Transaction</h4>

    <a href="{{ route('admin.transactions.create') }}" class="btn btn-primary mb-3">
        Input Transaction
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Product</th>
                <th>Type (In / Out)</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $t)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $t->user->name }}</td>
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
            @endforeach
        </tbody>
    </table>

</div>
@endsection
