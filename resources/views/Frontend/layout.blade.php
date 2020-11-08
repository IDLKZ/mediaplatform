<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/css/style.css">
    <link rel="stylesheet" href="/frontend/css/media.css">
    <link rel="stylesheet" href="/css/front.css">
    <title>Jas Qalam</title>
</head>
<body>
@include('Frontend.header')
@yield('content')
@include('Frontend.footer')
<script src="/frontend/js/jquery.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<script src="/frontend/js/jquery-color.js"></script>
<script src="/frontend/js/scripts.js"></script>
<script src="/frontend/js/media.js"></script>
</body>
</html>
