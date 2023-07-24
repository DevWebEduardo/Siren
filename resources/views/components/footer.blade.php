<footer class="flex lg:mt-2 bg-blue-300 w-full">
            <div class="flex flex-wrap justify-center items-center p-4 my-6 text-blue-950 text-lg bg-blue-400 w-full mx-auto xl:container xl:rounded">
                <div class="w-full md:w-3/12 flex justify-center text-white items-center text-center md:md:min-w-[300px] my-1 md:my-4 md:my-auto">
                    <ul>
                        <li class="my-4 md:my-6">
                            <a href="" class="bg-blue-600 rounded px-10 py-2 md:px-12 md:py-3 hover:bg-blue-800 duration-700">
                                {{ __("Home") }}
                            </a>
                        </li>
                        @auth
                            <li class="my-4 md:my-6">
                                <a href="{{ url('/dashboard') }}" class="bg-blue-600 rounded px-10 py-2 md:px-12 md:py-3 hover:bg-blue-800 duration-700">
                                    {{ __('Painel') }}
                                </a>
                            </li>
                            <li class="">
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <button type="submit" class="bg-blue-600 rounded px-10 py-2 md:px-12 md:py-3 hover:bg-blue-800 duration-700">
                                        {{ __('Logout') }}
                                    </button>
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="my-4 md:my-6">
                                <a href="/login" class="bg-blue-600 rounded px-10 py-2 md:px-12 md:py-3 hover:bg-blue-800 duration-700">
                                    {{ __('Login') }}
                                </a>
                            </li>
                            <li class="my-4 md:my-6">
                                <a href="/" class="bg-blue-600 rounded px-10 py-2 md:px-12 md:py-3 hover:bg-blue-800 duration-700">
                                    {{ __('Register') }}
                                </a>
                            </li>
                        @endguest
                        <li class="my-4 md:my-6">
                            <a href="" class="bg-blue-600 rounded px-10 py-2 md:px-12 md:py-3 hover:bg-blue-800 duration-700">
                                {{ __("Contact") }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="w-full md:w-3/12 flex justify-center items-center flex-wrap md:min-w-[300px] my-1 md:my-4 md:my-auto">
                    <ul class="flex flex-wrap justify-center pt-2 text-6xl">
                        <li class="p-1"><a href="https://discord.gg/wVGwtZ39VZ" class="hover:opacity-70" target="_blank"><i class="fa-brands fa-discord"></i></a></li>
                        <li class="p-1"><a href="https://www.instagram.com/devweb.eduardo" class="hover:opacity-70" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                        <li class="p-1"><a href="https://www.youtube.com/@webdev.eduardo" class="hover:opacity-70" target="_blank"><i class="fa-brands fa-square-youtube"></i></a></li>
                        <li class="p-1"><a href="https://twitter.com/devweb_eduardo" class="hover:opacity-70" target="_blank"><i class="fa-brands fa-square-twitter"></i></a></li>
                    </ul>
                </div>
                <div class="w-full md:w-3/12 flex justify-center items-center text-center md:min-w-[300px] my-1 md:my-4 md:my-auto">
                    <ul>
                        <li class="my-2">
                            <a href="/terms" class="hover:underline">
                                {{ __("Terms of use") }}
                            </a>
                        </li>
                        <li class="my-2">
                            <a href="/privacy-policy" class="hover:underline">
                                {{ __("Privacy Policy") }}
                            </a>
                        </li>
                        <li class="my-2">
                            <a href="https://solanin.icu/contact" class="hover:underline" target="__blank()">
                                {{ __("Contact") }}
                            </a>
                        </li>
                    </ul>
                </div>
                <p class="w-full text-center md:text-lg text-white px-6">{{ __("Maintained by") }} <a href="https://solanin.icu/" target="__blank" class="underline text-blue-600 hover:text-white">Solanin DevBlog.</a></p>
            </div>
        </footer>