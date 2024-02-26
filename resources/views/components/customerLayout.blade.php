<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    font Inter--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    {{--    font Playfair Display--}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
          rel="stylesheet">
    {{--    bootstrap css + js--}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{--    file css tuy chinh--}}
    <link rel="stylesheet" href="{{ asset('plugins/css/customer.css') }}" type="text/css">
    <title>Project 2 - Tam</title>
</head>
<body>
@include('partials.customerNavbar')
{{$slot}}
@include('partials.customerFooter')
</body>
</html>
