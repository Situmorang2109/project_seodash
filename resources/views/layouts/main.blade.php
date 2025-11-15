<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEODash</title>

    {{-- BOOTSTRAP CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">

    {{-- CUSTOM CSS --}}
    <style>
        .layout {
            display: flex;
            min-height: 100vh;
            background: #f8fafc;
        }

        .sidebar {
            width: 230px;
            background: white;
            border-right: 1px solid #e5e7eb;
            padding: 20px;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .content {
            flex: 1;
            padding: 30px;
        }

        .menu-link {
            display: block;
            padding: 10px 12px;
            margin-bottom: 5px;
            border-radius: 8px;
            color: #555;
            text-decoration: none;
        }

        .menu-link.active {
            background: #2f6bff;
            color: white;
        }

        .menu-link:hover {
            background: #e2e8f0;
        }
    </style>
</head>

<body>

    <div class="layout">

        {{-- SIDEBAR --}}
        @include('partials.sidebar')

        {{-- RIGHT CONTENT --}}
        <div class="content">

            {{-- NAVBAR TOP --}}
            <nav class="bg-white shadow-sm px-4 py-3 mb-4 d-flex justify-content-end align-items-center"
                style="border-radius: 8px;">

                <div class="dropdown">
                    <button class="btn dropdown-toggle d-flex align-items-center" type="button"
                        data-bs-toggle="dropdown">

                        <img src="{{ asset('assets/images/profile/user-2.jpg') }}" alt="profile"
                            style="width:36px;height:36px;border-radius:50%;object-fit:cover;">

                        <span class="ms-2">
                            {{ Auth::check() ? Auth::user()->name : 'Guest' }}
                        </span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                        @if(Auth::check())
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        @else
                            <li><a href="{{ route('login') }}" class="dropdown-item">Login</a></li>
                        @endif
                    </ul>
                </div>
            </nav>

            {{-- MAIN PAGE --}}
            @yield('content')

        </div>
    </div>

    {{-- BOOTSTRAP JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>
