<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Write Your Message</title>
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
            max-width: 600px;
            margin: 30px auto;
            text-align: center;
        }

        .content h1 {
            font-size: 1.8em;
            margin-bottom: 20px;
            color: #333;
        }

        .content p {
            font-size: 1.2em;
            font-style: italic;
            margin-bottom: 20px;
        }

        form {
            background-color: #ffecec;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            font-size: 1.1em;
            color: #333;
            text-align: left;
        }

        input[type="text"], textarea, input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1em;
            box-sizing: border-box;
        }

        input[type="file"] {
            padding: 8px;
            background-color: #fff;
            cursor: pointer;
        }

        textarea {
            height: 100px;
        }

        .button-container {
            text-align: right;
            margin-top: 20px;
        }

        .button-container button {
            background-color: #f28c8c;
            color: white;
            font-size: 1.1em;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            cursor: pointer;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .button-container button:hover {
            background-color: #e87070;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">BirthCard</div>
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
        <h1>Write your message here</h1>
        <form action="{{route('guest.sendMessage')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="source">"Where did you know Rista?"</label>
            <input type="text" id="source" name="asal_kenalan" placeholder="Type your answer here...">

            <label for="message">Message :</label>
            <textarea id="message" name="isi_pesan" placeholder="Type your message here..."></textarea>

            <label for="file">Upload File:</label>
            <input type="file" id="file" name="lampiran">

            <div class="button-container">
                <button type="submit">SEND</button>
            </div>
        </form>
    </div>
</body>
</html>
