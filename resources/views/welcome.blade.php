<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome page</title>
    @vite(['resources/scss/welcome.scss'])
</head>
<body>
    <h1>Welcome page</h1>

<!-- Route to the games index page -->
<a href="{{ route('games.index') }}">Go to the games index page</a>
</body>
</html>