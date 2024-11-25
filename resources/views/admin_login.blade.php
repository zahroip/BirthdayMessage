<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BirthCard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">BirthCard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="login-container text-center">
            <img src="https://via.placeholder.com/100" alt="Cute Bear" class="cute-bear">
             <form action="{{ route('admin.handleLogin') }}" method="POST">
        @csrf
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope"></i>
                        </span>
                        <input type="email" name="email" class="form-control" id="email" placeholder="ZahroIndah@gmail.com">
                    </div>
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock"></i>
                        </span>
                        <input type="password" name="password" class="form-control" id="password" placeholder="***********">
                    </div>
                </div>
                <button type="submit" class="btn login-btn w-100">LOGIN</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
