<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <form action="{{ route('users.store') }}" method="get">
    <!-- 1. CSRF Protection Token -->
    @csrf

    <!-- 2. Method Spoofing (Only if your route is PUT, PATCH, or DELETE) -->


    <!-- 3. Form Input with Old Data Retention -->
    <div>
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}">
        
        <!-- 4. Validation Error Display -->
        @error('email')
            <span style="color: red;">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit">Submit</button>
</form>
</body>
</html>