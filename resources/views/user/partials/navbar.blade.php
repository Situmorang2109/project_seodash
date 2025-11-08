<nav class="d-flex justify-content-end align-items-center">
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
            {{ auth()->user()->name }}
        </button>

        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('user.profile.index') }}">My Profile</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item text-danger">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
