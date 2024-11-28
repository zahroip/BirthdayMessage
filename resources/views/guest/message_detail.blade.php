<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BirthCard Messages</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #d26d6d;
            color: white;
            padding: 15px 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .logo {
            font-size: 28px;
            font-weight: bold;
            font-family: 'Cursive', sans-serif;
            color: white;
        }

        .navbar .menu a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 16px;
        }

        .navbar .menu a:hover {
            text-decoration: underline;
        }

        .navbar .menu a.logout {
            border: 1px solid white;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .navbar .menu a.logout:hover {
            background-color: #b35c5c;
        }

        /* Container */
        .container {
            padding: 30px 40px;
            max-width: 900px;
            margin: 20px auto;
        }

        .container h1 {
            font-size: 28px;
            font-weight: bold;
            color: #444;
            margin-bottom: 30px;
            text-align: center;
        }

        /* Message Cards */
        .message-card {
            display: flex;
            align-items: center;
            background-color: #fdecec;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .message-card:hover {
            transform: translateY(-5px);
        }

        .message-card.gray {
            background-color: #d9d9d9;
        }

        .avatar {
            width: 60px;
            height: 60px;
            background-color: #bbb;
            border-radius: 50%;
            margin-right: 20px;
            background-image: url('https://via.placeholder.com/60');
            background-size: cover;
            background-position: center;
        }

        .message-content {
            width: 100%;
            background-color: white;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            font-size: 16px;
            color: #555;
            border: 1px solid #ddd;
        }

        /* Adjust styles for the name */
        .message-name {
            font-weight: bold;
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }

        /* Textarea Styling */
        .message-content {
            font-size: 14px;
            padding: 12px;
            color: #333;
            background-color: #f9f9f9;
            border-radius: 6px;
            resize: none;
            width: 100%;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-reply {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-reply:hover {
            background-color: #45a049;
        }

        /* Full Modal Textarea */
        .modal textarea {
            width: 100%;
            height: 200px;
            font-size: 16px;
            padding: 15px;
            border-radius: 6px;
            resize: vertical;
            box-sizing: border-box;
        }

        /* Alert styles */
        .alert {
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }

        .alert-success {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a class="navbar-brand" href="#" style="font-family: 'Pacifico', cursive">BirthdayCard</a>
        <div class="menu">
            <a href="#">Home</a>
            
            <a href="#" class="logout">Log Out</a>
        </div>
    </div>

    <div class="container">
        <h1>Messages For You:</h1>

        <!-- Start of foreach loop for multiple messages -->
        @foreach($messages as $message)
        <div class="message-card">
            <div class="avatar"></div>
            <div>
                <input class="message-name" value="{{ $message->user_name }}" readonly> <!-- Name displayed above the message -->
                <textarea class="message-content" readonly>{{ $message->isi_pesan }}</textarea>
                <button class="btn-reply" onclick="openReplyModal({{ $message->id_messages }})">Reply</button> <!-- Message content below the name -->
            </div>
            <div id="filePreview" style="margin-bottom: 20px;">
                <!-- Dynamic content for file preview will go here -->
            </div>
        </div>
        @endforeach
    </div>

    <div id="replyModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeReplyModal()">&times;</span>
            <h2>Reply to Message</h2>
            <form action="{{ route('admin.jawab') }}" method="POST" id="replyForm">
                @csrf
                <input type="hidden" id="message_id" name="message_id">
                <textarea name="reply_message" placeholder="Type your reply here..." required></textarea>
                <button type="submit" class="btn-reply">Send Reply</button>
            </form>
            <div id="alertSuccess" class="alert" style="display:none;">Reply successfully sent!</div>
        </div>
    </div>

    <script>
        function openReplyModal(messageId, filePath, fileType) {
            document.getElementById('message_id').value = messageId;

            const filePreview = document.getElementById('filePreview');
            filePreview.innerHTML = ''; // Clear previous content

            if (filePath) {
                // Determine how to display the file based on its type
                if (['jpg', 'jpeg', 'png', 'gif'].includes(fileType)) {
                    filePreview.innerHTML = `<img src="${filePath}" alt="Attachment" style="max-width: 100%; max-height: 300px;">`;
                } else if (['mp4', 'webm', 'ogg'].includes(fileType)) {
                    filePreview.innerHTML = `<video controls style="max-width: 100%; max-height: 300px;"><source src="${filePath}" type="video/${fileType}">Your browser does not support the video tag.</video>`;
                } else if (['mp3', 'wav'].includes(fileType)) {
                    filePreview.innerHTML = `<audio controls style="max-width: 100%;"><source src="${filePath}" type="audio/${fileType}">Your browser does not support the audio tag.</audio>`;
                } else {
                    filePreview.innerHTML = `<p><a href="${filePath}" target="_blank">Download File</a></p>`;
                }
            } else {
                filePreview.innerHTML = `<p>No file attached.</p>`;
            }

            // Display the modal
            document.getElementById('replyModal').style.display = 'block';
        }

        function closeReplyModal() {
            document.getElementById('replyModal').style.display = 'none';
        }
    </script>

    <script>
        // Function to open the reply modal and set the message ID
        function openReplyModal(messageId) {
            document.getElementById("replyModal").style.display = "block";
            document.getElementById("message_id").value = messageId; // Set the message ID in the hidden input
        }

        // Function to close the reply modal
        function closeReplyModal() {
            document.getElementById("replyModal").style.display = "none";
        }

        // Close the modal if the user clicks outside of the modal content
        window.onclick = function(event) {
            if (event.target == document.getElementById("replyModal")) {
                closeReplyModal();
            }
        }

        // Display success alert when the form is successfully submitted
        @if(session('success'))
            window.onload = function() {
                var alert = document.getElementById('successAlert');
                alert.style.display = 'block'; // Show the success alert
                setTimeout(function() {
                    alert.style.display = 'none'; // Hide it after 3 seconds
                }, 3000);
            };
        @endif
    </script>
</body>
</html>
