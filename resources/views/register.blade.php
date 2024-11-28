<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - BirthCard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #FDE0DC; /* Soft pink background */
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            background-color: #F9C8D3; /* Lighter pink background */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h4.card-title {
            color: #D0848D; /* Dark pink color */
            font-size: 1.5rem;
        }

        .input-group-text {
            background-color: #F8D0C6; /* Soft pink for icons */
            color: #D0848D;
        }

        .form-control {
            border-radius: 10px;
            padding-left: 20px;
        }

        .btn {
            background-color: #D0848D; /* Dark pink button */
            color: white;
            border-radius: 10px;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #B76873;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .img-bear {
            position: absolute;
            left: 10%;
            bottom: 10%;
            width: 120px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="login-container text-center">
        <h4 class="card-title">Create an Account</h4>
        <form action="{{ route('guest.handleRegister') }}" method="POST">
            @csrf
            <div class="mb-3 text-start">
                <label for="name" class="form-label">Nama</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Nama Anda" required>
                </div>
            </div>
            <div class="mb-3 text-start">
                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" class="form-control" id="email" placeholder="example@email.com" required>
                </div>
            </div>
            <div class="mb-3 text-start">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>
            </div>
            <div class="mb-3 text-start">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                </div>
            </div>
            <button type="submit" class="btn w-100">REGISTER</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
