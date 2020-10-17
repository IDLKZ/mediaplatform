<!doctype html>
<html class="no-js " lang="en">
<head>
    <base href="/">
    <meta charset="utf-8">

    <title>:: Falcon - Admin Dashboard ::</title>
    <link rel="icon" type="image/ico" href="/images/favicon.ico" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- vendor css files -->
    <script src="https://use.fontawesome.com/542408d0a0.js"></script>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/toastr.css">
    <link rel="stylesheet" href="/css/select2.min.css">
</head>
<body id="falcon" class="main_Wrapper">
<div id="wrap" class="animsition">
    <!-- HEADER Content -->
    @include('student.header')
    <!--/ HEADER Content  -->
    <div id="controls">
        @include('student.left_sidebar')
        @include('student.right_sidebar')
    </div>
    <!-- CONTENT -->
    <section id="content">
            @yield('content')
    </section>
</div>

<script src="js/admin.js"></script>
<script src="/js/toastr.js"></script>
<script src="/js/ckeditor.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/myscript.js"></script>
{!! Toastr::message() !!}
</body>
</html>

