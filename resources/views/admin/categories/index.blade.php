@extends('layouts.main')

@section('content')
<div class="card p-4">
    <h3 class="fw-bold mb-4">Tampil Category</h3>

    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary mb-3">Tambah</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th width="200px">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($categories as $c)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $c->name }}</td>
                <td>
                    <a href="{{ route('admin.categories.show', $c->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('admin.categories.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.categories.destroy', $c->id) }}"
                          method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin?')">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
