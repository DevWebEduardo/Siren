<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>@yield('title')</title>
    <!-- Scripts -->
        @vite(['resources/js/app.js'])
    <link rel="stylesheet" href="/assets/css/style.tailwind.css">
</head>
<body class="bg-emerald-50">
    <header>
        <nav class="bg-blue-300 lg:mt-4 flex flex-col md:w-auto md:flex-row justify-center items-center w-full h-auto md:h-14 md:h-16 text-2xl md:text-xl xl:text-2xl xl:mx-auto xl:container md:rounded">
            <div class="w-full md:hidden px-2 mx-4">
                <i class="fa-solid fa-bars py-2 text-4xl md:hidden cursor-pointer" id="mb-button"></i>
            </div>
            <ul class="h-full w-full pb-4 md:pb-0 md:w-auto hidden md:flex" id="mb-menu">
                <li class="flex justify-center items-center h-full">
                    <a href="/" class="flex justify-center items-center md:mx-2 px-6 py-3 w-full md:w-auto lg:mx-4 md:h-full hover:bg-blue-200 duration-700">
                        Home
                    </a>
                </li>
                <li class="flex justify-center items-center h-full">
                    <a href="/dashboard" class="flex justify-center items-center md:mx-2 px-6 py-3 w-full md:w-auto lg:mx-4 md:h-full hover:bg-blue-200 duration-700">
                        Painel
                    </a>
                </li>
                <li class="flex justify-center items-center h-full">
                    <a href="/user/profile" class="flex justify-center items-center md:mx-2 px-6 py-3 w-full md:w-auto lg:mx-4 md:h-full hover:bg-blue-200 duration-700">
                        Account
                    </a>
                </li>
                <li class="flex justify-center items-center h-full">
                    <form method="POST" action="{{ route('logout') }}" x-data class="h-full w-full">
                        @csrf
                        <button type="submit" @click.prevent="$root.submit();" class="flex justify-center items-center md:mx-2 px-6 py-3 w-full md:w-auto lg:mx-4 md:h-full hover:bg-blue-200 duration-700">
                            {{ __('Logout') }}
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>
    <main class="w-full my-6 md:container mx-auto">
    @yield('content')
    </main>
    <footer class="flex lg:mt-2 bg-blue-300 w-full">
            <div class="flex flex-wrap justify-center items-center p-4 my-6 text-blue-950 text-lg bg-blue-400 w-full mx-auto xl:container xl:rounded">
                <div class="w-full md:w-3/12 flex justify-center text-white items-center text-center md:md:min-w-[300px] my-1 md:my-4 md:my-auto">
                    <ul>
                        <li class="my-4 md:my-6">
                            <a href="" class="bg-blue-600 rounded px-10 py-2 md:px-12 md:py-3 hover:bg-blue-800 duration-700">
                                Home
                            </a>
                        </li>
                        <li class="my-4 md:my-6">
                            <a href="" class="bg-blue-600 rounded px-10 py-2 md:px-12 md:py-3 hover:bg-blue-800 duration-700">
                                Rent or Buy
                            </a>
                        </li>
                        <li class="my-4 md:my-6">
                            <a href="" class="bg-blue-600 rounded px-10 py-2 md:px-12 md:py-3 hover:bg-blue-800 duration-700">
                                About
                            </a>
                        </li>
                        <li class="my-4 md:my-6">
                            <a href="" class="bg-blue-600 rounded px-10 py-2 md:px-12 md:py-3 hover:bg-blue-800 duration-700">
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="w-full md:w-3/12 flex justify-center items-center flex-wrap md:min-w-[300px] my-1 md:my-4 md:my-auto">
                    <img src="/assets/images/icons/facebook.png" alt="facebook" class="hover:opacity-80 h-12 xl:h-14 px-1">
                    <img src="/assets/images/icons/instagram.png" alt="instagram" class="hover:opacity-80 h-12 xl:h-14 px-1">
                    <img src="/assets/images/icons/twitter.png" alt="twitter" class="hover:opacity-80 h-12 xl:h-14 px-1">
                    <img src="/assets/images/icons/youtube.png" alt="youtube" class="hover:opacity-80 h-12 xl:h-14 px-1">
                </div>
                <div class="w-full md:w-3/12 flex justify-center items-center text-center md:min-w-[300px] my-1 md:my-4 md:my-auto">
                    <ul>
                        <li class="my-2">
                            <a href="" class="hover:underline">
                                Terms of use
                            </a>
                        </li>
                        <li class="my-2">
                            <a href="" class="hover:underline">
                                Privacy Policy
                            </a>
                        </li>
                        <li class="my-2">
                            <a href="" class="hover:underline">
                                Intellectual Property Protection
                            </a>
                        </li>
                    </ul>
                </div>
                <p class="w-full text-center md:text-lg text-white px-6">Siren - All rights reserved</p>
            </div>
    </footer>
    <script>
        var btn = document.querySelector('i[id=mb-button]'); 
        var menu = document.querySelector('ul[id=mb-menu]');
            btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
    @stack('modals')
    @livewireScripts
</body>
</html>