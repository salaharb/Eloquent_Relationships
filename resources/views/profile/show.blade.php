<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!-- resources/views/profile/show.blade.php -->
    @foreach ($users as $user)
        <div>
            <h2>User:</h2>
            <p>Name: {{ $user->name }}</p>
            <p>Email: {{ $user->email }}</p>

            <h2>Profile:</h2>
            @if ($user->profile)
                <p>Bio: {{ $user->profile->bio }}</p>
            @else
                <p>No profile available.</p>
            @endif
        </div>
    @endforeach

</body>

</html>
