<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesan Guest</title>
</head>
<body>
    <h1>Daftar Pesan</h1>
    <ul>
        @foreach ($messages as $message)
            <li>
                <a href="{{ route('admin.messageDetail', $message->id) }}">
                    {{ $message->user->name }} ({{ $message->relation_to_admin }})
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>

