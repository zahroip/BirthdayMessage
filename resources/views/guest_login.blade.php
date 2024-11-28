<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BirthCard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #ffe8e8;
        }

        .login-container {
            max-width: 400px;
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .login-container .login-btn {
            background-color: #f26b6b;
            color: #fff;
        }

        .login-container .login-btn:hover {
            background-color: #e65555;
        }

        .navbar {
            background-color: #f26b6b;
        }

        .navbar-brand {
            font-family: 'Arial', sans-serif;
            color: #fff;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .cute-bear {
            width: 100px;
            display: block;
            margin: 0 auto 20px;
        }

        .card-title {
            font-weight: bold;
            color: #f26b6b;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#" style="font-family: 'Pacifico', cursive">BirthdayCard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{route('home')}}">Home</a></li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-container text-center">
            <img src="{{ asset('gambar/logo1.jpeg') }}" alt="Cute Bear" class="cute-bear">
            <h4 class="card-title">Login to Greetings</h4>
            <form action="{{ route('guest.handleLogin') }}" method="POST">
		@csrf
                <div class="mb-3 text-start">
                    <label for="name" class="form-label">Nama</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda">
                    </div>
                </div>
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email" name="email" class="form-control" id="email" placeholder="example@email.com">
                    </div>
                </div>
                <button type="submit" class="btn login-btn w-100">LOGIN</button>
                <li class="nav-item"><a class="nav-link" href="{{ route('guest.register') }}">Register</a></li>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>

</html>
