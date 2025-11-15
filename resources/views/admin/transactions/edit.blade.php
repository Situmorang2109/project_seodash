@extends('layouts.main')

@section('content')
<div class="page-content">

    <h3 class="fw-bold mb-4">Edit Transaction</h3>

    <div class="card p-4 shadow-sm">

        <form action="{{ route('admin.transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" value="{{ $transaction->name }}" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Product</label>
                <select name="product_id" class="form-control">
                    @foreach($products as $p)
                        <option value="{{ $p->id }}"
                            {{ $p->id == $transaction->product_id ? 'selected' : '' }}>
                            {{ $p->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-control">
                    <option value="in"  {{ $transaction->type == 'in' ? 'selected' : '' }}>In</option>
                    <option value="out" {{ $transaction->type == 'out' ? 'selected' : '' }}>Out</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" value="{{ $transaction->amount }}" class="form-control">
            </div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('admin.transactions.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>

</div>
@endsection
