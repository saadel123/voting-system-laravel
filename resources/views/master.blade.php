<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- end favicon -->


    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    @yield('stylesheet')
</head>

<body>
    {{-- @include('site.layouts.header') --}}
    @include('sweetalert::alert')

    @yield('content')

    {{-- @include('site.layouts.footer') --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script> --}}
    @yield('javascripts')

</body>


</html>
