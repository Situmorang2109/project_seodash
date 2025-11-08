<div style="width: 220px; background: #f5f6fa; height: 100vh;" class="p-3">
    <h4 class="fw-bold mb-4">SEODash</h4>

    <p class="text-muted">HOME</p>
    <ul class="nav flex-column mb-4">
        <li class="nav-item">
            <a href="{{ route('user.dashboard') }}" class="nav-link">Dashboard</a>
        </li>
    </ul>

    <p class="text-muted">MASTER</p>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('user.products.index') }}" class="nav-link">Product</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('user.transactions.index') }}" class="nav-link">Transaction</a>
        </li>
    </ul>
</div>
