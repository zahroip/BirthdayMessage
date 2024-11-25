<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BirthCard - Greetings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffe8e8;
        }
        .navbar {
            background-color: #f26b6b;
        }
        .navbar-brand {
            font-family: 'Arial', sans-serif;
            font-size: 1.5rem;
            color: #fff;
        }
        .navbar-nav .nav-link {
            color: #fff;
        }
        .content-container {
            text-align: center;
            padding: 40px;
        }
        .brand-logo {
            font-family: 'Brush Script MT', cursive;
            font-size: 2.5rem;
            color: #f26b6b;
            display: inline-block;
        }
        .brand-logo img {
            width: 30px;
            margin-right: 5px;
        }
        .main-image {
            width: 250px;
            margin: 20px 0;
        }
        .login-btn {
            background-color: #f26b6b;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 1.2rem;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }
        .login-btn:hover {
            background-color: #d14f4f;
        }
        .subtitle {
            font-family: 'Arial', sans-serif;
            color: #f26b6b;
            font-weight: bold;
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
                    <li class="nav-item"><a class="nav-link" href="help.blade.php">Help</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content-container">
        <div class="brand-logo">
            <img src="https://via.placeholder.com/30" alt="Ribbon Icon">
            BirthCard
        </div>
        <img src="https://via.placeholder.com/250" alt="Bear and Cake" class="main-image">
        <!-- Button Login -->
        <div>
            <button class="login-btn"><a href="{{ route('chooseLogin') }}" >Login</a></button>
        </div>
        <br><br><br>
        <p class="subtitle">Let’s wish her happiest birthday</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
