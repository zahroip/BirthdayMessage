<!-- resources/views/guest/view_message.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Message</title>
</head>
<body>
    <h1>Your Message</h1>
    <p><strong>Message:</strong> {{ $message->message }}</p>
    <p><strong>Relation to Admin:</strong> {{ $message->relation_to_admin }}</p>

    <!-- Show attachment if available -->
    @if($message->attachment)
        <p><strong>Attachment:</strong> <a href="{{ Storage::url($message->attachment) }}" target="_blank">Download</a></p>
    @endif

    <a href="{{ route('guest.editMessage', $message->id) }}">Edit Message</a>
    <form action="{{ route('guest.deleteMessage', $message->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete Message</button>
    </form>
</body>
</html>
