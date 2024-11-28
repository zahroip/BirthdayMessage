<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BirthLand Greetings</title>
  <link rel="stylesheet" href="styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <style>
    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #ffece4;
      color: #333;
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
    main {
      text-align: center;
    }

    main h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .form-content {
      background-color: #fff7f3;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      text-align: left;
    }

    .form-content p {
      margin: 10px 0;
    }

    .form-content a {
      text-decoration: none;
      color: #8a8a8a;
      font-weight: bold;
    }

    textarea {
      width: 100%;
      height: 80px;
      margin-top: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      resize: none;
      background-color: #f9f9f9;
      color: #aaa;
      font-size: 14px;
      font-family: Arial, sans-serif;
    }

    /* Buttons */
    .buttons {
      margin-top: 20px;
      display: flex;
      gap: 10px;
    }

    button {
      padding: 10px 20px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-size: 14px;
      font-weight: bold;
    }

    button.edit {
      background-color: #f08080;
      color: white;
    }

    button.delete {
      background-color: #f08080;
      color: white;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <a class="navbar-brand" href="#" style="font-family: 'Pacifico', cursive">BirthdayCard</a>
        <div class="right">
            <a href="{{route('admin.dashboard')}}">Home</a>
            <a href="#" class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>

            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <main>
      <h1></h1>

      <!-- Edit Form -->
      <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-content">
          @if($message->lampiran)
            @php
                $filePath = storage_path('app/public/' . $message->lampiran); // Adjust path based on where the file is stored
                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
            @endphp

            @if(in_array($fileExtension, ['jpg', 'jpeg', 'png', 'gif']))
                <!-- Display image -->
                <img src="{{ asset('storage/uploads/' . $message->lampiran) }}" alt="Uploaded Image" style="max-width: 50%; height: auto;">
            @elseif(in_array($fileExtension, ['mp4', 'webm', 'ogg']))
                <!-- Display video -->
                <video controls style="max-width: 100%; height: auto;">
                    <source src="{{ asset('storage/uploads/' . $message->lampiran) }}" type="video/{{$fileExtension}}">
                    Your browser does not support the video tag.
                </video>
            @elseif(in_array($fileExtension, ['mp3', 'wav', 'ogg']))
                <!-- Display audio -->
                <audio controls>
                    <source src="{{ asset('storage/uploads/' . $message->lampiran) }}" type="audio/{{$fileExtension}}">
                    Your browser does not support the audio element.
                </audio>
            @else
                <p>Unsupported file type.</p>
            @endif
          @else
            <p>No file uploaded.</p>
          @endif




      </form>

     </div>
    </main>
  </div>
</body>
</html>
