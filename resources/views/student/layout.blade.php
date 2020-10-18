<!doctype html>
<html class="no-js " lang="en">
<head>
    <base href="/">
    <meta charset="utf-8">

    <title>:: Falcon - Admin Dashboard ::</title>
    <link rel="icon" type="image/ico" href="/images/favicon.ico" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- vendor css files -->
    <script src="https://use.fontawesome.com/542408d0a0.js"></script>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/toastr.css">
    <link rel="stylesheet" href="/css/jquery.mn-file.css">
    @yield('css')
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
<script src="/js/jquery.mn-file.js"></script>
@yield('js')
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{!! JsValidator::formRequest('App\Http\Requests\UpdateProfile', '#my-form')  !!}
{!! Toastr::message() !!}
<script>
    $("[type=file]").mnFileInput({
        // left, right or button
        display: 'left',
        // button text
        controlMsg : 'Выберите файл',
        // image preview element
        preview : '.preview',
        // supported extensions
        previewSupportedExt : ['png', 'jpeg', 'jpg', 'gif']
    });
</script>

</body>
</html>

