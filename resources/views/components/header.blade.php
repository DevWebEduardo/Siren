<header class="w-full">
            <nav class="bg-blue-300 flex flex-col md:w-auto md:flex-row justify-center items-center w-full h-auto md:h-14 md:h-16 text-xl xl:text-2xl xl:mx-auto xl:container">
                <div class="w-full md:hidden px-2 mx-4">
                    <i class="fa-solid fa-bars py-2 text-4xl md:hidden cursor-pointer" id="mb-button"></i>
                </div>
                <ul class="h-full w-full md:w-auto hidden md:flex" id="mb-menu">
                    <li class="h-full flex flex-col w-full md:w-auto md:flex-row">
                        <a href="/" class="flex justify-center items-center w-full py-3 md:py-0 md:w-auto md:h-full duration-700 ease-in md:px-8 lg:px-12 hover:bg-blue-200">
                            {{ __('Home') }}
                        </a>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="flex justify-center items-center w-full py-3 md:py-0 md:w-auto md:h-full duration-700 ease-in md:px-8 lg:px-12 hover:bg-blue-200">
                            {{ __('Painel') }}
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
                            {{ __('Login') }}
                        </a>
                        <a href="/register" class="flex justify-center items-center w-full py-3 md:py-0 md:w-auto md:h-full duration-700 ease-in md:px-8 lg:px-12 hover:bg-blue-200">
                            {{ __('Register') }}
                        </a>
                    @endguest
                        <a href="https://solanin.icu/contact/" class="flex justify-center items-center w-full py-3 md:py-0 md:w-auto md:h-full duration-700 ease-in md:px-8 lg:px-12 hover:bg-blue-200" target="__blank">
                            {{ __('Contact') }}
                        </a>
                    </li>
                </ul>
            </nav>
            @if (!request()->query() && request()->is('/'))
                <div class="flex w-full head-h xl:container xl:mx-auto">
                    <div class="flex justify-center items-center flex-col w-full h-full flex justify-center items-center bg-emerald-50 head-bg">
                        <img src="/assets/images/logo.png" alt="logo" class="logo-index">
                        <p class="text-4xl lg:text-5xl 2xl:text-6xl">Siren</p>
                    </div>
                </div>
                <section class="flex justify-center items-center bg-blue-300 mx-auto px-2 py-2 xl:container xl:rounded-b">
            @else
                <section class="flex justify-center items-center bg-blue-300 lg:bg-inherit mx-auto px-2 py-2 xl:container xl:rounded-b">
            @endif
                <div class="flex bg-blue-400 p-1 rounded">
                    <form action="/lg" method="POST" class="mr-1">
                        @csrf
                        @method('POST')
                        <input type="text" name="language" value="en" hidden>
                        <button type="submit" class="
                        @if(App::currentLocale() == 'en')
                             bg-blue-500 
                        @endif
                        py-2 px-3">EN</button>
                    </form>
                    <form action="/lg" method="POST">
                        @csrf
                        @method('POST')
                        <input type="text" name="language" value="jp" hidden>
                        <button type="submit" class="
                        @if(App::currentLocale() == 'jp')
                             bg-blue-500 
                        @endif
                        py-2 px-3">JP</button>
                    </form>
                </div>
            </section>
        </header>
