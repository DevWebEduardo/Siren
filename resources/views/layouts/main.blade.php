<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" href="/assets/images/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="/assets/css/style.tailwind.css" rel="stylesheet">
    </head>
    <body class="bg-orange-50">
        @include('components.header')
        <main class="flex flex-col lg:flex-row w-full xl:container mx-auto">
            @if (request()->is('/'))
                @include('components.home')
            @else
                @include('components.ad')
            @endif
        </main>
        @include('components.popup-policies')
        @include('components.footer')
        <script>
            var btn = document.querySelector('i[id=mb-button]'); 
            var menu = document.querySelector('ul[id=mb-menu]');
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                });
        </script>
    </body>
</html>

