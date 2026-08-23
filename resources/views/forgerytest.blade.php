<!DOCTYPE html>
<html>
<head>
    <title>Forgery Test</title>
</head>
<body>

<h1>CSRF Origin Test</h1>

<form method="POST" action="/test-forgery">
    @csrf

    <button type="submit">Send Request</button>
</form>

</body>
</html>