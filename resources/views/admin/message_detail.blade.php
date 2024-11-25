<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pesan</title>
</head>
<body>
    <h1>Detail Pesan</h1>
    <p><strong>Nama:</strong> {{ $message->user->name }}</p>
    <p><strong>Dari Mana Kenal Admin:</strong> {{ $message->relation_to_admin }}</p>
    <p><strong>Isi Pesan:</strong> {{ $message->message }}</p>
    @if ($message->attachment)
        <p><strong>Attachment:</strong> <a href="{{ asset('storage/' . $message->attachment) }}" target="_blank">Lihat File</a></p>
    @endif

    @if ($message->is_replied)
        <h2>Balasan Admin</h2>
        <p>{{ $message->admin_reply }}</p>
        @if ($message->reply_attachment)
            <p><strong>Attachment Balasan:</strong> <a href="{{ asset('storage/' . $message->reply_attachment) }}" target="_blank">Lihat File</a></p>
        @endif
    @else
        <h2>Balas Pesan</h2>
        <form action="{{ route('admin.replyMessage', $message->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <textarea name="admin_reply" placeholder="Tulis balasan..." required></textarea><br>
            <label for="reply_attachment">Lampirkan File:</label>
            <input type="file" name="reply_attachment" accept=".jpg,.jpeg,.png,.pdf"><br>
            <button type="submit">Kirim Balasan</button>
        </form>
    @endif

    <a href="{{ route('admin.messages') }}">Kembali ke Daftar Pesan</a>
</body>
</html>
