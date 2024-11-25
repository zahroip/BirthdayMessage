<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You - BirthCard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to bottom, #ffc1c1, #ffe8e8);
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #f26b6b;
        }

        .navbar-brand,
        .navbar-nav .nav-link {
            color: white;
        }

        .navbar-nav .nav-link:hover {
            text-decoration: underline;
        }

        .thank-you-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .thank-you-container h1 {
            font-size: 4rem;
            color: white;
            text-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
            margin-bottom: 20px;
        }

        .thank-you-container p {
            font-size: 1.25rem;
            color: white;
        }

        .btn-primary {
            background-color: #f26b6b;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 20px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary:hover {
            background-color: #e65555;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
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

    <div class="thank-you-container">
        <h1>Thank You!</h1>
        <p>Your message has been sent.</p>
        <button class="btn btn-primary mt-4"><a href="{{ route('guest.viewMessage') }}">See Message</a></button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
