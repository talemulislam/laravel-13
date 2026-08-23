<!DOCTYPE html>
<html>
<head>
    <title>Rate Limit Test</title>
</head>
<body>

    <h1>Login Rate Limit Test</h1>

    <form method="POST" action="/login">
        @csrf

        <label>Email:</label>

        <input
            type="email"
            name="email"
            value="john@example.com"
        >

        <button type="submit">
            Login
        </button>
    </form>

</body>
</html>