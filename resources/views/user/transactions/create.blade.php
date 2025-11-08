@extends('layouts.main')

@section('content')

<h2>Transaction</h2>

<form method="POST" action="{{ route('user.transactions.store') }}">
@csrf

<label>Product</label>
<select name="product_id" class="form-control">
    @foreach($products as $p)
        <option value="{{ $p->id }}">{{ $p->name }}</option>
    @endforeach
</select>

<label>Type</label>
<select name="type" class="form-control mt-2">
    <option value="in">In</option>
    <option value="out">Out</option>
</select>

<label>Amount</label>
<input type="number" name="amount" class="form-control mt-2">

<button class="btn btn-primary mt-3">Submit</button>

</form>

@endsection
