<div class="sidebar">
    <h4 class="px-3 py-3">ADMIN PANEL</h4>

    <ul class="nav flex-column">
        <li><a href="{{ route('admin.dashboard') }}" class="nav-link">Dashboard</a></li>
        <li><a href="{{ route('admin.categories.index') }}" class="nav-link">Categories</a></li>
        <li><a href="{{ route('admin.products.index') }}" class="nav-link">Products</a></li>
        <li><a href="{{ route('admin.transactions.index') }}" class="nav-link">Transactions</a></li>
    </ul>

    <form action="{{ route('logout') }}" method="POST" class="m-3">
        @csrf
        <button class="btn btn-danger w-100">Logout</button>
    </form>
</div>
