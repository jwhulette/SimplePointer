<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @production
    @include('google')
    @endproduction
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#48bb78">
    <meta name="msapplication-TileColor" content="#00a300">
    <meta name="theme-color" content="#48bb78">
    <meta name="description" content="A free online agile pointing poker application">
    <meta name="keywords" content="agile, pointing, pointing poker, free">
    <meta name="author" content="Wes Hulette">
    <meta property="og:url" content="https://simplepointer.com" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="A free online agile pointing poker application" />
    <meta property="og:description" content="A free online agile pointing poker application" />
    <title>Simple Pointer - @yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">

</head>

<body class="body">

    <header>
        @include('nav')
    </header>


    <div class="container mx-auto page-content">

        <div id="app">
            @yield('content')
        </div>


    </div>

    <footer class="footer">
        <div class="container mx-auto font-light text-center">
            <small>Copyright &copy; {{ date('Y') }} Simple Pointer</small>
            {{-- <small class="ml-12"><a href="{{ route('terms') }}">Terms & Conditions</a></small> --}}
        </div>
    </footer>

    <script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
</body>

</html>
