<html lang="EN">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css/all.css') }}">


<body>
    @include('layout.nav')

    <div class="container py-4">
        @yield('content')
    </div>
    <script src="{{ asset('/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
