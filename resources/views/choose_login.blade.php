<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Who Are You? - BirthCard</title>
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
            color: #fff;
        }
        .navbar-nav .nav-link {
            color: #fff;
        }
        .content-container {
            text-align: center;
            margin-top: 50px;
        }
        .cute-image {
            width: 150px;
            margin-bottom: 20px;
        }
        .card-container {
            background: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: inline-block;
        }
        .card-container h2 {
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            color: #7d7d7d;
        }
        .card-container .btn {
            background-color: #f26b6b;
            color: #fff;
            border: none;
            width: 120px;
        }
        .card-container .btn:hover {
            background-color: #e65555;
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
                    <li class="nav-item"><a class="nav-link" href="#">Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content-container">
        <img src="https://via.placeholder.com/150" alt="Cute Gift Icon" class="cute-image">
        <div class="card-container">
            <h2>WHO ARE YOU?</h2>
            <div class="d-grid gap-2">
		<form action="{{ route('chooseLogin') }}" method="POST">
        	@csrf
                <button class="btn btn-rounded"  type="submit" name="login_as" value="admin">Admin</button>
            <button class="btn btn-rounded" type="submit" name="login_as" value="guest">Guest</button>
		</form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
