<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="/">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Forum</title>
    <link rel="stylesheet" href="css/admin.css">
    @yield('css')
</head>
<body class="antialiased">
    @yield('content')
<script src="js/admin.js"></script>
@yield('js')
</body>
</html>

