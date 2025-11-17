<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css">

    <style>
        .layout { display:flex; min-height:100vh; background:#f8fafc; }
        .sidebar { width:230px; background:white; border-right:1px solid #e5e7eb; padding:20px; }
        .content { flex:1; padding:30px; }
        .menu-link { display:block; padding:10px 12px; margin-bottom:6px; border-radius:8px; color:#555; text-decoration:none; }
        .menu-link.active { background:#2563eb; color:white; }
        .menu-link:hover { background:#e2e8f0; }
    </style>
</head>
<body>

<div class="layout">

    {{-- Sidebar --}}
    @include('user.partials.sidebar')

    <div class="content">

        {{-- Navbar --}}
        @include('user.partials.navbar')

        {{-- Page Content --}}
        @yield('content')

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

</body>
</html>
