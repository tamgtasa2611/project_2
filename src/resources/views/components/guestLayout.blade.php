<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    favicon--}}
    <link rel="icon" type="image/x-icon" href="{{asset('images/logo_1.png')}}">
    {{--    jquery--}}
    <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    {{--    scroll reveal--}}
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
    {{--    bootstrap css + js--}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{--    alertify --}}
    <!-- include the style -->
    <link rel="stylesheet" href="{{asset('plugins/alert/css/alertify.min.css')}}"/>
    <!-- include a theme -->
    <link rel="stylesheet" href="{{asset('plugins/alert/css/themes/default.min.css')}}"/>
    {{--    css mdb--}}
    <link rel=" stylesheet
    " href="{{ asset('plugins/mdb/css/mdb.min.css') }}">
    {{--    font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Marcellus&display=swap"
        rel="stylesheet">
    {{--    mcdatepicker--}}
    <link href="https://cdn.jsdelivr.net/npm/mc-datepicker/dist/mc-calendar.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/mc-datepicker/dist/mc-calendar.min.js"></script>
    {{--    file css tuy chinh--}}
    <link rel="stylesheet" href="{{ asset('plugins/css/main.css') }}" type="text/css">
    <title>Project 2 - Tam</title>
</head>
<body class="overflow-x-hidden overflow-y-auto bg-light-subtle">
@include('partials.guest.guestNavbar')
{{$slot}}
@include('partials.guest.guestFooter')
<script
    type="text/javascript"
    src="{{asset('plugins/js/script.js')}}"
></script>
<!--alertify-->
<script src="{{asset('plugins/alert/alertify.min.js')}}">
</script>
{{--mdb--}}
<script
    type="text/javascript"
    src="{{asset('plugins/mdb/js/mdb.umd.min.js')}}"
></script>
<script
    type="text/javascript"
    src="{{asset('plugins/mdb/js/mdb.es.min.js/')}}"
></script>
</body>
</html>
