<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SEODash</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <style>
        body {
            background: #eef3ff;
            height: 100vh;
        }
        .card {
            border-radius: 22px;
            padding: 40px;
        }
        .btn-primary {
            background: #2f6bff;
            border-radius: 25px !important;
            padding: 12px;
            border: none;
        }
        .btn-primary:hover {
            background: #1f4fcc;
        }
        input.form-control {
            padding: 10px;
            border-radius: 12px;
        }
        label {
            font-weight: 600;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

    <div class="card shadow-lg col-md-4">

        <h3 class="text-center mb-1 fw-bold">SEODash</h3>
        <p class="text-center text-muted mb-4">Create a New Account</p>

        {{-- ERROR MESSAGE --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM --}}
        <form action="{{ route('register') }}" method="POST">
            @csrf

            <label>Name</label>
            <input type="text" name="name"
                   class="form-control mb-3" required
                   value="{{ old('name') }}">

            <label>Email Address</label>
            <input type="email" name="email"
                   class="form-control mb-3" required
                   value="{{ old('email') }}">

            <label>Password</label>
            <input type="password" name="password"
                   class="form-control mb-3" required>

            <label>Confirm Password</label>
            <input type="password" name="password_confirmation"
                   class="form-control mb-4" required>

            <button type="submit" class="btn btn-primary w-100">
                Create Account
            </button>

            <p class="text-center mt-3">
                Already have an account?
                <a href="{{ route('login') }}" class="fw-bold">Sign In</a>
            </p>
        </form>
    </div>

</body>

</html>
