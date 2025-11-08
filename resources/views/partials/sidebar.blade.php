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

    <a href="/{{ auth()->user()->role }}/dashboard" 
       class="menu-link {{ Request::is(auth()->user()->role.'/dashboard') ? 'active' : '' }}">
        <i class="ti ti-layout-dashboard"></i>
        Dashboard
    </a>

    {{-- MASTER SECTION (ADMIN ONLY) --}}
    @if(auth()->user()->role == 'admin')
        <h6 class="text-muted small ms-3 mt-4">MASTER</h6>

        <a href="{{ route('categories.index') }}" 
           class="menu-link {{ Request::is('categories*') ? 'active' : '' }}">
            <i class="ti ti-folder"></i>
            Categories
        </a>

        <a href="{{ route('products.index') }}" 
           class="menu-link {{ Request::is('products*') ? 'active' : '' }}">
            <i class="ti ti-package"></i>
            Products
        </a>

        <a href="{{ route('transactions.index') }}" 
           class="menu-link {{ Request::is('transactions*') ? 'active' : '' }}">
            <i class="ti ti-database"></i>
            Transaction
        </a>
    @endif

</div>
