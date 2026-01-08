<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Admin</h1>
    @foreach ($data as $item)
        <p>{{ $item->name }}</p>
    @endforeach

    <form action="{{ route('admin.logout') }}" method="POST">
        @csrf
        <button type="submit">Log out</button>
    </form>
</body>
</html>