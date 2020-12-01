<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Медиапортал</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <script src="https://use.fontawesome.com/542408d0a0.js"></script>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="stylesheet" href="/css/toastr.css">

</head>

<body id="falcon" class="authentication">
<!-- Application Content -->
<div class="wrapper">
    <div class="header header-filter" style="background-image: url('/images/login-bg.jpg'); background-size: cover; background-position: top center;">
        @yield('content')
    </div>
</div>
<!--/ Application Content -->
<!--  Vendor JavaScripts -->
<script src="/js/admin.js"></script>
<script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
@if (isset($validator))
    {!! $validator->selector('#my-form')  !!}
@endif

<script src="/js/toastr.js"></script>
{!! Toastr::message() !!}
</body>
</html>

