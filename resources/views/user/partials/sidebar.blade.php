<div class="sidebar">

    <h4 class="fw-bold mb-4">USER PANEL</h4>

    <a href="{{ route('user.dashboard') }}" 
       class="menu-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
        Dashboard
    </a>

    <a href="{{ route('user.products.index') }}" 
       class="menu-link {{ request()->routeIs('user.products.*') ? 'active' : '' }}">
        Products
    </a>

    <a href="{{ route('user.transactions.index') }}" 
       class="menu-link {{ request()->routeIs('user.transactions.*') ? 'active' : '' }}">
        Transactions
    </a>

    <a href="{{ route('user.profile') }}" 
       class="menu-link {{ request()->routeIs('user.profile') ? 'active' : '' }}">
        Profile
    </a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn-danger w-100 mt-3">Logout</button>
    </form>

</div>
