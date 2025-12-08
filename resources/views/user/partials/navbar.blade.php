<nav class="bg-white shadow-sm px-4 py-3 mb-4 d-flex justify-content-between align-items-center" style="border-radius: 8px;">
    <h5 class="fw-bold text-primary mb-0">Welcome, {{ Auth::check() ? Auth::user()->name : 'Guest' }}</h5>

    <div class="dropdown">
        <button class="btn dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/images/profile/user-2.jpg') }}" alt="profile" style="width:36px; height:36px; border-radius:50%; object-fit:cover;">
        </button>

        <ul class="dropdown-menu dropdown-menu-end">
            @if(Auth::check())
                <li><a href="{{ route('user.profile') }}" class="dropdown-item">My Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="dropdown-item text-danger">Logout</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}" class="dropdown-item">Login</a></li>
            @endif
        </ul>
    </div>
</nav>
