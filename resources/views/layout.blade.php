<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Simple Pointer - @yield('title')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.0/css/bootstrap.min.css"
        integrity="sha256-/ykJw/wDxMa0AQhHDYfuMEwVb4JHMx9h4jD4XvHqVzU=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">


</head>

<body>
    <header><a href="{{ route('home') }}">HOME</a></header>
    <div class="flex-center position-ref full-height">

        <div id="app">
            @yield('content')
        </div>

    </div>
    <footer>Footer</footer>
    <script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>

</html>
