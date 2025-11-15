<div class="sidebar">
    <h4 class="fw-bold mb-4 text-primary">SEODash</h4>

    <div class="menu">
        <a href="{{ route('user.dashboard') }}" 
           class="menu-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
            <i class="bi bi-house me-2"></i> Dashboard
        </a>

        <a href="{{ route('user.products.index') }}" 
           class="menu-link {{ request()->routeIs('user.products.*') ? 'active' : '' }}">
            <i class="bi bi-bag me-2"></i> Products
        </a>

        <a href="{{ route('user.profile.index') }}" 
           class="menu-link {{ request()->routeIs('user.profile.*') ? 'active' : '' }}">
            <i class="bi bi-person me-2"></i> Profile
        </a>

        <a href="{{ route('user.transactions.index') }}" 
           class="menu-link {{ request()->routeIs('user.transactions.*') ? 'active' : '' }}">
            <i class="bi bi-receipt me-2"></i> Transactions
        </a>
    </div>
</div>
