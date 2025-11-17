<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User - SEODash</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <style>
        body { background: #eef3ff; height: 100vh; }
        .card { border-radius: 20px; padding: 40px; }
        button { background: #2f6bff; border-radius: 25px !important; padding: 12px; }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

    <div class="card shadow-lg col-md-4">

        <h3 class="text-center mb-1">SEODash</h3>
        <p class="text-center text-muted">Register User</p>

        <form action="{{ route('register') }}" method="POST">
            @csrf

            <label>Name</label>
            <input type="text" name="name" class="form-control mb-3">

            <label>Email Address</label>
            <input type="email" name="email" class="form-control mb-3">

            <label>Password</label>
            <input type="password" name="password" class="form-control mb-3">

            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control mb-4">

            <button type="submit" class="btn btn-primary w-100">Submit</button>

            <p class="text-center mt-3">
                Already have an Account?
                <a href="{{ route('login') }}">Sign In</a>
            </p>

        </form>
    </div>

</body>

</html>
