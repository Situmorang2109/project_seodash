<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SEODash</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body class="d-flex justify-content-center align-items-center" style="height:100vh; background:#eef3ff">

<div class="card shadow-lg col-md-4 p-4" style="border-radius:20px">
    <h3 class="text-center mb-1">SEODash</h3>
    <p class="text-center text-muted">Sign In</p>

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <label>Email</label>
        <input type="email" name="email" class="form-control mb-3">

        <label>Password</label>
        <input type="password" name="password" class="form-control mb-3">

        <button class="btn btn-primary w-100" style="border-radius:25px">Login</button>

        <p class="text-center mt-3">
            Don’t have an account?
            <a href="{{ route('register') }}">Register</a>
        </p>
    </form>
</div>

</body>
</html>
