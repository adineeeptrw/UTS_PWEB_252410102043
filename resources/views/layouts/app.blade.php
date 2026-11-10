<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Mauw Coffee') | Mauw Coffee</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @isset($username)
        <x-navbar :username="$username" />
    @endisset

    <main class="container">
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
