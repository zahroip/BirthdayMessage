<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday Card</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Header */
        .header {
            background-color: #e87a82;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }

        .header .right {
            display: flex;
            align-items: center;
        }

        .header a:hover {
            text-decoration: underline;
        }

        /* Main Content */
        .content {
            text-align: center;
            padding: 50px;
            background-color: #fcdada;
        }

        .content h1 {
            font-size: 3em;
            margin: 0;
        }

        .content .sub-text {
            margin: 10px 0 30px;
            font-size: 1.2em;
            color: #333;
        }

        .content .cat {
            max-width: 200px;
            margin-top: 20px;
        }

        /* Button */
        .button-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 150px; /* Adjust height as needed */
            background-color: #fff5f5;
        }

        .button {
            background-color: #f28c8c;
            color: white;
            font-size: 1.2em;
            padding: 15px 30px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            margin-right: 7px;
        }

        .button:hover {
            background-color: #e87070;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <a class="navbar-brand" href="#" style="font-family: 'Pacifico', cursive">BirthdayCard</a>
        <div class="right">
            <a href="{{route('guest.dashboard')}}">Home</a>
            <a href="#" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>

            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Happy Birthday</h1>
        <p class="sub-text">SEND HER SOME WISHES</p>
        <img src="{{ asset('gambar/logo1.jpeg') }}" alt="Birthday Cat" class="cat">
    </div>

    <!-- Button -->
    <div class="button-container">
        <a href="{{ route('guest.kirim_pesan') }}" class="button">CLICK ME</a>
        @if(!empty($message->jawaban))
        <a href="{{ route('guest.viewMessage') }}" class="button">Message</a>
        @endif
    </div>
</body>
</html>
