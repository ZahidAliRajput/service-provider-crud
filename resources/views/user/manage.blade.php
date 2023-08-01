<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Service - Provider - Index</title>
</head>
<body>
    <a href="{{ route('user.create') }}" type="button"> Add </a>
    <table border="1">
        <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Action</td>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('user.edit', $user->id) }}" type="button">Edit</a>
                <a href="{{ route('user.destroy', $user->id) }}" type="button">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>