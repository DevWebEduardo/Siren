<aside class="flex flex-col justify-center lg:mt-2 lg:rounded text-center bg-blue-300 h-full w-full lg:w-3/12">
                <form action="/" method="GET" class="flex flex-col justify-center items-center flex-wrap sm:flex-row lg:block w-full px-2 md:px-4 py-0 md:py-6 lg:py-8 sm:3/6">
                    @method('GET')
                    <input type="text" name="filter" value="true" hidden>
                    <div class="w-full sm:w-4/12 lg:w-full mx-2 pr-4 md:pr-0 lg:mx-0">
                        <p class="w-full text-lg md:text-xl pb-2 pt-6 md:pb-4 md:pt-8 lg:pt-0">{{ __('Properties') }}</p>
                        <select name="pro" class="w-full text-lg md:text-xl p-2 bg-blue-400 text-center">
                            @foreach ($protype as $option)
                                <option value="{{ $option->id }}" {{ isset($pro) && $pro == $option->id ? 'selected' : '' }}>
                                    {{ $option->name }}
                                </option>
                            @endforeach  
                        </select>
                    </div>
                    <div class="w-full sm:w-4/12 md:w-3/12 lg:w-full mx-2 pr-4 md:pr-0 lg:mx-0">
                        <p class="w-full text-lg md:text-xl pb-2 pt-6 md:pb-4 md:pt-8">{{ __('Location') }}</p>
                        <select name="location" class="w-full text-lg md:text-xl p-2 bg-blue-400 text-center">
                            @foreach ($locations as $option)
                                <option value="{{ $option->id }}" {{ isset($location) && $location == $option->id ? 'selected' : '' }}>
                                    {{ $option->name }}
                                </option>
                            @endforeach  
                        </select>
                    </div>
                    <div class="w-full sm:w-4/12 md:w-3/12 lg:w-full mx-2 pr-4 md:pr-0 lg:mx-0">
                        <p class="w-full text-lg md:text-xl pb-2 pt-6 md:pb-4 md:pt-8">{{ __('Type') }}</p>
                        <select name="type" class="w-full text-lg md:text-xl p-2 bg-blue-400 text-center">
                            @foreach ($adtype as $option)
                                <option value="{{ $option->id }}" {{ isset($ad_type) && $ad_type == $option->id ? 'selected' : '' }}>
                                    {{ $option->name }}
                                </option>
                            @endforeach  
                        </select>
                    </div>
                    <div class="w-full sm:w-4/12 md:w-3/12 lg:w-full mx-2 pr-4 md:pr-0 lg:mx-0">
                        <p class="w-full text-lg md:text-xl pb-2 pt-6 md:pb-4 md:pt-8">{{ __("Order by") }}</p>
                        <select name="order" class="w-full text-lg md:text-xl p-2 bg-blue-400 text-center">
                            @php
                                $options = [
                                    'newest' => 'Newest - 最新',
                                    'oldest' => 'Oldest - 最古',
                                    'lowest_price' => 'Lowest price - 最低価格',
                                    'highest_price' => 'Highest price - 最高価格',
                                ];
                            @endphp
                            @foreach ($options as $option => $label)
                                <option value="{{ $option }}" {{ isset($order) && $order === $option ? 'selected' : '' }}>
                                    {{ $label }}
                                </option>
                             @endforeach
                        </select>
                    </div>
                    <div class="w-full flex justify-center items-center lg:block lg:w-auto mb-7 md:mb-6 lg:mb-2 mt-5 ">
                        <button class="bg-green-600 text-white font-medium text-center px-10 md:px-14 py-1 md:py-2 text-lg md:text-xl rounded hover:bg-green-500 hover:bg-green-500 hover:text-black duration-700">{{ __('Search') }}</button>
                    </div>
                </form>
            </aside>
            <section class="w-full lg:block lg:w-9/12 lg:ml-2">
                <div class="w-full lg:mt-2 bg-slate-300 xl:rounded">
                    <form action="" class="w-full flex flex-col xl:flex-row justify-center items-center p-4">
                        <input type="text" name="search" class="mx-2 h-8 xl:h-10 p-1 mb-2 xl:mb-0 rounded w-full md:w-8/12 xl:w-3/6 border border-slate-700" value="{{ $text ?? '' }}">
                        <button class="bg-green-600 text-white font-medium h-8 xl:h-10 text-center px-14 text-xl rounded hover:bg-green-500 hover:bg-green-500 hover:text-black duration-700">{{ __('Search') }}</button>
                    </form>
                </div>
                <div class="w-full p-2 lg:p-4 lg:mt-2 bg-slate-300 xl:rounded min-h-40">
                    @yield('content')
                </div>
            </section>