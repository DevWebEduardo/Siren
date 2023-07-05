<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link rel="icon" type="image/png" href="/assets/images/logo.png">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="assets/css/style.tailwind.css" rel="stylesheet">
    </head>
    <body class="bg-orange-50">
        <header class="w-full">
            <nav class="bg-blue-300 flex flex-col md:w-auto md:flex-row justify-center items-center w-full h-auto md:h-14 md:h-16 text-xl xl:text-2xl xl:mx-auto xl:container">
                <div class="w-full md:hidden px-2 mx-4">
                    <i class="fa-solid fa-bars py-2 text-4xl md:hidden cursor-pointer" id="mb-button"></i>
                </div>
                <ul class="h-full w-full md:w-auto hidden md:flex" id="mb-menu">
                    <li class="h-full flex flex-col w-full md:w-auto md:flex-row">
                        <a href="" class="flex justify-center items-center w-full py-3 md:py-0 md:w-auto md:h-full duration-700 ease-in md:px-8 lg:px-12 hover:bg-blue-200">
                            Home
                        </a>
                        <a href="" class="flex justify-center items-center w-full py-3 md:py-0 md:w-auto md:h-full duration-700 ease-in md:px-8 lg:px-12 hover:bg-blue-200">
                            Rent or Buy
                        </a>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="flex justify-center items-center w-full py-3 md:py-0 md:w-auto md:h-full duration-700 ease-in md:px-8 lg:px-12 hover:bg-blue-200">
                            Painel
                        </a>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <button type="submit" @click.prevent="$root.submit();" class="flex justify-center items-center w-full py-3 md:py-0 md:w-auto md:h-full duration-700 ease-in md:px-8 lg:px-12 hover:bg-blue-200">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    @endauth
                    @guest
                        <a href="/login" class="flex justify-center items-center w-full py-3 md:py-0 md:w-auto md:h-full duration-700 ease-in md:px-8 lg:px-12 hover:bg-blue-200">
                            Login
                        </a>
                        <a href="/register" class="flex justify-center items-center w-full py-3 md:py-0 md:w-auto md:h-full duration-700 ease-in md:px-8 lg:px-12 hover:bg-blue-200">
                            Register
                        </a>
                    @endguest
                        <a href="" class="flex justify-center items-center w-full py-3 md:py-0 md:w-auto md:h-full duration-700 ease-in md:px-8 lg:px-12 hover:bg-blue-200">
                            Contact
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="flex w-full head-h xl:container xl:mx-auto">
                <div class="flex justify-center items-center flex-col w-full h-full flex justify-center items-center bg-emerald-50 head-bg">
                    <img src="/assets/images/logo.png" alt="logo" class="logo-index">
                    <p class="text-4xl lg:text-5xl 2xl:text-6xl">Siren</p>
                </div>
            </div>
        </header>
        <main class="flex flex-col lg:flex-row w-full xl:container mx-auto">
            <aside class="flex flex-col justify-center lg:mt-2 lg:rounded text-center bg-blue-300 h-full w-full lg:w-3/12">
                <form action="" class="flex flex-col justify-center items-center flex-wrap sm:flex-row lg:block w-full px-2 md:px-4 py-0 md:py-6 lg:py-8 sm:3/6">
                    <div class="w-full sm:w-4/12 lg:w-full mx-2 pr-4 md:pr-0 lg:mx-0">
                        <p class="w-full text-lg md:text-xl pb-2 pt-6 md:pb-4 md:pt-8 lg:pt-0">Properties</p>
                        <select name="" class="w-full text-lg md:text-xl p-2 bg-blue-400 text-center">
                            @foreach ($protype as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach  
                        </select>
                    </div>
                    <div class="w-full sm:w-4/12 md:w-3/12 lg:w-full mx-2 pr-4 md:pr-0 lg:mx-0">
                        <p class="w-full text-lg md:text-xl pb-2 pt-6 md:pb-4 md:pt-8">Location</p>
                        <select name="" class="w-full text-lg md:text-xl p-2 bg-blue-400 text-center">
                            @foreach ($locations as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach  
                        </select>
                    </div>
                    <div class="w-full sm:w-4/12 md:w-3/12 lg:w-full mx-2 pr-4 md:pr-0 lg:mx-0">
                        <p class="w-full text-lg md:text-xl pb-2 pt-6 md:pb-4 md:pt-8">Type</p>
                        <select name="" class="w-full text-lg md:text-xl p-2 bg-blue-400 text-center">
                            @foreach ($adtype as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach  
                        </select>
                    </div>
                    <div class="w-full sm:w-4/12 md:w-3/12 lg:w-full mx-2 pr-4 md:pr-0 lg:mx-0">
                        <p class="w-full text-lg md:text-xl pb-2 pt-6 md:pb-4 md:pt-8">{{ __("Order by") }}</p>
                        <select name="" class="w-full text-lg md:text-xl p-2 bg-blue-400 text-center">
                            <option value="newest">{{ __("Newest") }}</option>
                            <option value="oldest">{{ __("Oldest") }}</option>
                            <option value="lowest_price">{{ __("Lowest price") }}</option>
                            <option value="highest_price">{{ __("Highest price") }}</option>
                        </select>
                    </div>
                    <div class="w-full flex justify-center items-center lg:block lg:w-auto mb-7 md:mb-6 lg:mb-2 mt-5 ">
                        <button class="bg-green-600 text-white font-medium text-center px-10 md:px-14 py-1 md:py-2 text-lg md:text-xl rounded hover:bg-green-500 hover:bg-green-500 hover:text-black duration-700">Search</button>
                    </div>
                </form>
            </aside>
            <section class="w-full lg:block lg:w-9/12 lg:ml-2">
                <div class="w-full lg:mt-2 bg-slate-300 xl:rounded">
                    <form action="" class="w-full flex flex-col xl:flex-row justify-center items-center p-4">
                        <input type="text" class="mx-2 h-8 xl:h-10 p-1 mb-2 xl:mb-0 rounded w-full md:w-8/12 xl:w-3/6">
                        <button class="bg-green-600 text-white font-medium h-8 xl:h-10 text-center px-14 text-xl rounded hover:bg-green-500 hover:bg-green-500 hover:text-black duration-700">Search</button>
                    </form>
                </div>
                <div class="w-full p-2 lg:p-4 lg:mt-2 bg-slate-300 xl:rounded">
                    @yield('content')
                </div>
            </section>
            
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
    </body>
</html>

