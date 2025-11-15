<div class="sidebar">

    {{-- LOGO --}}
    <div class="d-flex align-items-center mb-4 mt-2">
        <img src="/assets/images/logos/logo-light.svg" 
             alt="SEODash Logo" 
             style="height: 38px;">
        <span class="fw-bold ms-2" style="font-size: 20px; color: #111827;">
        </span>
    </div>

    {{-- HOME SECTION --}}
    <h6 class="text-muted small ms-3 mt-3">HOME</h6>

    @if (auth()->check())

        {{-- DASHBOARD --}}
        <a href="/{{ auth()->user()->role }}/dashboard" 
           class="menu-link {{ Request::is(auth()->user()->role.'/dashboard') ? 'active' : '' }}">
            <i class="ti ti-layout-dashboard"></i>
            Dashboard
        </a>

        {{-- MASTER SECTION (ADMIN ONLY) --}}
        @if (auth()->user()->role == 'admin')

            <h6 class="text-muted small ms-3 mt-4">MASTER</h6>

            <a href="{{ route('admin.categories.index') }}"
               class="menu-link {{ Request::is('admin/categories*') ? 'active' : '' }}">
                <i class="ti ti-folder"></i>
                Categories
            </a>

            <a href="{{ route('admin.products.index') }}"
               class="menu-link {{ Request::is('admin/products*') ? 'active' : '' }}">
                <i class="ti ti-package"></i>
                Products
            </a>

            <a href="{{ route('admin.transactions.index') }}"
               class="menu-link {{ Request::is('admin/transactions*') ? 'active' : '' }}">
                <i class="ti ti-database"></i>
                Transactions
            </a>

        @endif

        {{-- USER MENU --}}
        @if (auth()->user()->role == 'user')

            <h6 class="text-muted small ms-3 mt-4">USER MENU</h6>

            <a href="{{ route('user.products.index') }}"
               class="menu-link {{ Request::is('user/products*') ? 'active' : '' }}">
                <i class="ti ti-package"></i>
                Products
            </a>

            <a href="{{ route('user.transactions.index') }}"
               class="menu-link {{ Request::is('user/transactions*') ? 'active' : '' }}">
                <i class="ti ti-database"></i>
                Transactions
            </a>

            <a href="{{ route('user.profile.index') }}"
               class="menu-link {{ Request::is('user/profile*') ? 'active' : '' }}">
                <i class="ti ti-user"></i>
                Profile
            </a>

        @endif

    @endif

</div>
