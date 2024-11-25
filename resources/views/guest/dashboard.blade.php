<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guestbook - BirthCard</title>
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

        .guestbook-container {
            max-width: 600px;
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #f26b6b;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e65555;
        }

        a {
            color: #f26b6b;
        }

        a:hover {
            text-decoration: underline;
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
                    <li class="nav-item"><a class="nav-link active" href="#">Guestbook</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center">
        <div class="guestbook-container">
            <h2 class="text-center">Welcome, Guest!</h2>
            <p class="text-center">Thank you for visiting the Birthday Guestbook. Please let us know how you know the guest and send your message!</p>
             <form action="{{ route('guest.thankYou') }}" method="POST" enctype="multipart/form-data">
        @csrf
                <div class="mb-3">
                    <label for="relation_to_guest" class="form-label">How do you know the guest?</label>
                    <input type="text" class="form-control" id="relation" name="relation_to_guest" placeholder="e.g., Friend, Family">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Your Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Write your message here"></textarea>
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Attach a file (optional):</label>
                    <input type="file" class="form-control" id="file" name="attachment">
                </div>
                <button type="submit" class="btn btn-primary w-100">Send Message</button>
            </form>
            <div class="text-center mt-3">
                <a href="#">Back to Homepage</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
