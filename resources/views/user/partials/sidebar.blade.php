<div class="sidebar">
    <h4 class="px-3 py-3">PENGGUNA AKUN</h4>

    <ul class="nav flex-column">
        <li><a href="{{ route('user.dashboard') }}" class="nav-link">Dashboard</a></li>
        <li><a href="{{ route('user.products.index') }}" class="nav-link">Products</a></li>
        <li><a href="{{ route('user.transactions.index') }}" class="nav-link">Transactions</a></li>
        <li><a href="{{ route('user.profile') }}" class="nav-link">Profile</a></li>
    </ul>

    <form action="{{ route('logout') }}" method="POST" class="m-3">
        @csrf
        <button class="btn btn-danger w-100">Logout</button>
    </form>
</div>
