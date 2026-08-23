<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>

<h1>Users</h1>

<form method="POST" action="/users/25">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="John">

    <button type="submit">
        Update User
    </button>
</form>

</body>
</html>