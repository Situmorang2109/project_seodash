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
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th style="width:40px">#</th>
                        <th>Name</th>
                        <th>Product</th>
                        <th style="width:120px">Type</th>
                        <th style="width:100px">Amount</th>
                        <th style="width:180px">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($transactions as $t)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $t->name }}</td>

                        <td>
                            {{-- Klik product -> arahkan ke detail category yang kamu inginkan --}}
                            <a href="{{ route('admin.categories.show', $t->product->category_id) }}"
                               class="text-decoration-none fw-bold">
                                {{ $t->product->name }}
                            </a>
                        </td>

                        <td>
                            @if($t->type === 'in')
                                <span class="badge bg-primary">in</span>
                            @else
                                <span class="badge bg-danger">out</span>
                            @endif
                        </td>

                        <td>{{ $t->amount }}</td>

                        <td>
                            {{-- tombol berjarak: gunakan flex + gap --}}
                            <div class="d-flex align-items-center" style="gap:0.5rem;">
                                <a href="{{ route('admin.transactions.edit', $t->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Edit
                                </a>

                                <form action="{{ route('admin.transactions.destroy', $t->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus data?');"
                                      style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada Transaction
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- jika menggunakan pagination --}}
        @if(method_exists($transactions, 'links'))
        <div class="mt-3">
            {{ $transactions->links() }}
        </div>
        @endif
    </div>

</div>
@endsection
