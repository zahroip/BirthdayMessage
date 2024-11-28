<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You Page</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #ffecec;
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

        /* Content */
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: calc(100vh - 50px);
            text-align: center;
        }

        .content h1 {
            font-size: 3em;
            color: #ff6f91;
            margin: 20px 0;
            font-family: 'Comic Sans MS', cursive;
        }

        .content p {
            font-size: 1.2em;
            color: #444;
            margin-bottom: 30px;
        }

        .content .button-container {
            margin-top: 30px;
        }

        .content .button-container a {
            background: linear-gradient(135deg, #ff8b94, #ff6f91);
            border: none;
            color: white;
            padding: 12px 30px;
            font-size: 1em;
            font-weight: bold;
            border-radius: 20px;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .content .button-container a:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 10px rgba(0, 0, 0, 0.2);
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

    <!-- Content -->
    <div class="content">
        <h1>Thank you!</h1>
        <p>Your message has been sent.</p>
        <div class="button-container">
        <a href="{{ route('guest.viewMessage')}}">
            See Message
        </a><br>
        </div>
    </div>
</body>
</html>
