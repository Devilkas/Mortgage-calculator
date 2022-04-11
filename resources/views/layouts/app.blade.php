<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Mortgage calculator</title>
    <meta name="author" content="Kushnerov Oleksandr">
    <meta name="keywords" content="Mortgage calculator">
    <meta name="description" content="Mortgage calculator">
    <link href="{{ asset('css/rangeslider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <header class="header">
            @include('layouts._header')
        </header>
        <main class="main">
            @yield('content')
        </main>
        <footer class="footer">
            @include('layouts._footer')
        </footer>
    </div>
    @include('components._modals')
    <script src="{{ asset('js/rangeslider.min.js') }}"></script>
    <script script src="{{ asset('js/app.js') }}" defer data - turbolinks - suppress - warning data - turbolinks -
        eval="false">
    </script>
</body>

</html>
