@extends('layouts.main')

@section('content')
<div class="page-content">

    <h3 class="fw-bold mb-4">Tampil Transaction</h3>

    <a href="{{ route('admin.transactions.create') }}" class="btn btn-primary rounded-pill px-4 mb-4">
        Input Transaction
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card p-4 shadow-sm">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Product</th>
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($transactions as $t)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $t->name }}</td>

                    <td>
                        <a href="{{ route('admin.categories.show', $t->product->category_id) }}"
                           class="text-decoration-none fw-bold">
                            {{ $t->product->name }}
                        </a>
                    </td>

                    <td>
                        @if($t->type == 'in')
                            <span class="badge bg-primary">in</span>
                        @else
                            <span class="badge bg-danger">out</span>
                        @endif
                    </td>

                    <td>{{ $t->amount }}</td>

                    <td>
                        <a href="{{ route('admin.transactions.edit', $t->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('admin.transactions.destroy', $t->id) }}"
                              method="POST" class="d-inline"
                              onsubmit="return confirm('Yakin hapus data?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
