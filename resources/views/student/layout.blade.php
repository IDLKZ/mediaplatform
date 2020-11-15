<!doctype html>
<html class="no-js " lang="en">
<head>
    <base href="/">
    <meta charset="utf-8">

    <title>:: Jas Qalam ::</title>
    <link rel="icon" type="image/ico" href="/images/favicon.ico" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- vendor css files -->
    <script src="https://use.fontawesome.com/542408d0a0.js"></script>
    <script src="https://kit.fontawesome.com/eea0169c71.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/css/style.css">
    <link rel="stylesheet" href="/frontend/css/media.css">
    <link rel="stylesheet" href="/css/toastr.css">
    <link rel="stylesheet" href="/css/jquery.mn-file.css">
    <link rel="stylesheet" href="/css/front.css">
    <link rel="stylesheet" href="/css/circle.css">
    <link rel="stylesheet" href="/frontend/css/pushy.css">

    @yield('css')
</head>
<body id="falcon" class="main_Wrapper">
@include('student.header')
<div class="container">
    <div class="row">
        <div class="margin-75"></div>
        <div class="margin-25"></div>
        @yield('content')
        <div class="margin-25"></div>
    </div>
</div>

@include('student.footer')

<script src="/frontend/js/jquery.js"></script>
<script src="/frontend/js/bootstrap.min.js"></script>
<script src="/frontend/js/jquery-color.js"></script>
<script src="/frontend/js/scripts.js"></script>
<script src="/js/toastr.js"></script>
<script src="/js/jquery.mn-file.js"></script>
<script src="/js/ckeditor.js"></script>
<script src="/js/student.js"></script>
<script src="/frontend/js/pushy.min.js"></script>

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

