<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User - SEODash</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>

<div class="d-flex">
    @include('user.partials.sidebar')

    <div class="flex-grow-1 p-4">
        @include('user.partials.navbar')
        
        <div class="mt-4">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>
