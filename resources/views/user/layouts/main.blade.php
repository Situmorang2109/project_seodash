<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEODash - User</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">

    <style>
        .layout {
            display: flex;
            min-height: 100vh;
            background: #f8fafc;
        }

        .sidebar {
            width: 230px;
            background: #ffffff;
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

        {{-- Sidebar User --}}
        @include('user.partials.sidebar')

        <div class="content w-100">

            {{-- Navbar --}}
            @include('user.partials.navbar')

            {{-- Page Content --}}
            @yield('content')

        </div>
    </div>

    {{-- JS --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
