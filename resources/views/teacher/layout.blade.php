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
    <link rel="stylesheet" href="/css/dropzone.min.css">


</head>
<body id="falcon" class="main_Wrapper">
<div id="wrap" class="animsition">
    <!-- HEADER Content -->
        @include('teacher.header')
    <!--/ HEADER Content  -->
    <div id="controls">
        @include('teacher.left_sidebar')
        @include('teacher.right_sidebar')
    </div>
    <!-- CONTENT -->
    <section id="content">
        <div class="page dashboard-page">
            @yield('content')
        </div>
    </section>
</div>

<script src="js/admin.js"></script>
<script src="/js/toastr.js"></script>
<script src="/js/ckeditor.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/dropzone.min.js"></script>
<script src="/js/myscript.js"></script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
@if (isset($validator))
    {!! $validator->selector('#my-form')  !!}
@endif
{!! Toastr::message() !!}
</body>
</html>

