<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" href="/assets/images/logo.png">
        <link href="/assets/css/style.tailwind.css" rel="stylesheet">
    </head>
    <body class="bg-blue-100">

    <main class="w-full md:container mx-auto">
        @yield('content');
    </main>
    @include('components.popup-policies')
    </body>
</html>