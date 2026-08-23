<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
</head>
<body>

    <h1>User Profile</h1>

    @if ($user)
        <p>User ID: {{ $user['id'] }}</p>
        <p>Name: {{ $user['name'] }}</p>
        <p>Email: {{ $user['email'] }}</p>
    @else
        <p>User not found in cache.</p>
    @endif

</body>
</html>