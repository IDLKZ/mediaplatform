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
    <link rel="stylesheet" href="/css/select2.min.css">
    <link rel="stylesheet" href="/css/jquery.mn-file.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css" integrity="sha512-QKC1UZ/ZHNgFzVKSAhV5v5j73eeL9EEN289eKAEFaAjgAiobVAnVv/AGuPbXsKl1dNoel3kNr6PYnSiTzVVBCw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/backend.css">

</head>
<style>
    .progress { position:relative; width:100%; border: 1px solid #ddd; padding: 1px; border-radius: 3px; }
    .bar { background-color: #B4F5B4; width:0%; height:20px; border-radius: 3px; }
    .percent { position:absolute; display:inline-block; top:3px; left:48%; }
</style>
<body id="falcon" class="main_Wrapper">
<div id="wrap" class="animsition">
    <!-- HEADER Content -->
@include('admin.header')
<!--/ HEADER Content  -->
    <div id="controls">
        @include('admin.left_sidebar')
        @include('admin.right_sidebar')
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
<script src="/js/jquery.form.js"></script>
<script src="/js/ckeditor.js"></script>
<script src="/js/select2.min.js"></script>
<script src="/js/jquery.mn-file.js"></script>
<script src="/js/myscript.js"></script>
<script src="/js/ajax.js"></script>

<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
@if (isset($validator))
    {!! $validator->selector('#my-form')  !!}
@endif
{!! Toastr::message() !!}
<script>
    $("[type=file]").mnFileInput({
        // left, right or button
        display: 'left',
        // button text
        controlMsg : 'Выберите файл',
    });
</script>
<script src="/js/uploadajax.js"></script>
</body>
</html>

