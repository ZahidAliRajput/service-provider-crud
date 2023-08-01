<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit the User</title>
</head>
<body>

    <form method="POST" action="{{ route('user.update', $user->id) }}">
        @csrf
        <input type="text" name="name" value="{{ $user->name ?? '' }}"><br><br>
        <input type="email" name="email" value="{{ $user->email ?? '' }}"><br><br>
        <input type="text" name="password"><br><br>
        <button type="submit">Add</button>
    </form>
</body>
</html>