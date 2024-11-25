<!-- resources/views/guest/edit_message.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your Message</title>
</head>
<body>
    <h1>Edit Your Message</h1>
    <form action="{{ route('guest.updateMessage', $message->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label for="message">Message:</label>
            <textarea name="message" id="message" required>{{ old('message', $message->message) }}</textarea>
        </div>
        <div>
            <label for="relation_to_admin">Relation to Admin:</label>
            <input type="text" name="relation_to_admin" id="relation_to_admin" value="{{ old('relation_to_admin', $message->relation_to_admin) }}" required>
        </div>
        <div>
            <label for="attachment">Attach a file (optional):</label>
            <input type="file" name="attachment" id="attachment">
        </div>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
