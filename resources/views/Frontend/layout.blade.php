<!doctype html>
<html lang="ru">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (!empty($_SESSION))
        @if (\Illuminate\Support\Facades\Request::url() === route('singlePost', $_SESSION['route']) || \Illuminate\Support\Facades\Request::url() === route('singleCategory', $_SESSION['route']))
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
            <link rel="stylesheet" href="/frontend/css/forums/bootstrap.css">
            <link rel="stylesheet" href="/frontend/css/forums/bootstrap-material-design.css">
            <link rel="stylesheet" href="/frontend/css/forums/ripples.min.css">
            <link rel="stylesheet" href="/frontend/css/forums/font-awesome.min.css">
            <link rel="stylesheet" href="/frontend/css/forums/style.css">
            <link rel="stylesheet" href="/frontend/css/forums/colors.css">
            <link rel="stylesheet" href="/frontend/css/style.css">
            <link rel="stylesheet" href="/frontend/css/media.css">
            <link rel="stylesheet" href="/css/front.css">
            <link rel="stylesheet" href="/css/toastr.css">
        @endif
    @else
        @if(\Illuminate\Support\Facades\Request::url() === route('forums'))
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
            <link rel="stylesheet" href="/frontend/css/forums/bootstrap.css">
            <link rel="stylesheet" href="/frontend/css/forums/bootstrap-material-design.css">
            <link rel="stylesheet" href="/frontend/css/forums/ripples.min.css">
            <link rel="stylesheet" href="/frontend/css/forums/font-awesome.min.css">
            <link rel="stylesheet" href="/frontend/css/forums/style.css">
            <link rel="stylesheet" href="/frontend/css/forums/colors.css">
            <link rel="stylesheet" href="/frontend/css/style.css">
            <link rel="stylesheet" href="/frontend/css/media.css">
            <link rel="stylesheet" href="/css/front.css">
            <link rel="stylesheet" href="/css/toastr.css">
        @else
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
            <link rel="stylesheet" href="/frontend/css/style.css">
            <link rel="stylesheet" href="/frontend/css/media.css">
            <link rel="stylesheet" href="/css/front.css">
        @endif
    @endif

    <title>Jas Qalam</title>
</head>
<body>
@include('Frontend.header')
@yield('content')
@include('Frontend.footer')
@if (!empty($_SESSION))
    @if (\Illuminate\Support\Facades\Request::url() === route('singlePost', $_SESSION['route']) || \Illuminate\Support\Facades\Request::url() === route('singleCategory', $_SESSION['route']))
        <script src="/frontend/js/forums/jquery.js"></script>
        <script src="/frontend/js/forums/bootstrap.js"></script>
        <script src="/frontend/js/forums/material.min.js"></script>
        <script src="/frontend/js/forums/ripples.min.js"></script>
        <script src="/js/toastr.js"></script>
        <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'description' );
        </script>
        {!! Toastr::message() !!}
    @endif
@else
    @if(\Illuminate\Support\Facades\Request::url() === route('forums'))
        <script src="/frontend/js/forums/jquery.js"></script>
        <script src="/frontend/js/forums/bootstrap.js"></script>
        <script src="/frontend/js/forums/material.min.js"></script>
        <script src="/frontend/js/forums/ripples.min.js"></script>
        <script src="/js/toastr.js"></script>
        <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace( 'description' );
        </script>
        {!! Toastr::message() !!}
    @else
        <script src="/frontend/js/jquery.js"></script>
        <script src="/frontend/js/bootstrap.min.js"></script>
        <script src="/frontend/js/jquery-color.js"></script>
        <script src="/frontend/js/scripts.js"></script>
        <script src="/frontend/js/media.js"></script>
    @endif
@endif

</body>
</html>
