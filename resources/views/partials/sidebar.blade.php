<div class="sidebar">
    <h4 class="fw-bold mb-4">ADMIN PANEL</h4>

    <a href="{{ route('admin.dashboard') }}" class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('admin.categories.index') }}" class="menu-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">Categories</a>
    <a href="{{ route('admin.products.index') }}" class="menu-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">Products</a>
    <a href="{{ route('admin.transactions.index') }}" class="menu-link {{ request()->routeIs('admin.transactions.*') ? 'active' : '' }}">Transactions</a>

    <form action="{{ route('logout') }}" method="POST" style="margin-top: 18px;">
        @csrf
        <button class="btn btn-danger w-100">Logout</button>
    </form>
</div>
