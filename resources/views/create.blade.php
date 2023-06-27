@extends('layouts.dashboard')
@section('title', 'Create Ad')
@section('content')
    @if (session('msg'))
        <div class="w-full mb-4 rounded text-center p-2 md:p-4 text-xl bg-gray-700 text-white">
            {{ session('msg') }}
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="w-full mb-4 rounded text-center p-2 md:p-4 text-xl bg-gray-700 text-white">
                {{ $error }}
            </div>
        @endforeach
    @endif
    <div class="w-full mx-auto bg-blue-300 p-2 md:rounded md:container md:p-4">
        <div>
            <form action="/ad" method="POST" enctype="multipart/form-data" class="w-full justify-center items-center text-center">
                @csrf
                @method('POST')
                <div class="mb-6">
                    <label for="title" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Title") }}</label>
                    <input type="text" id="title" name="title" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="{{ __('Title') }}" required>
                </div> 
                <div class="mb-6">
                    <label for="description" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Description") }}</label>
                    <textarea id="description" name="description" class="border-2 border-blue-400 h-48 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="{{ __('Description') }}" required></textarea>
                </div> 
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-6">
                    <div>
                        <label for="bedrooms" class="block mb-2 text-xl font-medium text-gray-900">{{ __("Number of Bedrooms") }}</label>
                        <input type="number" name="bedrooms" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="{{ __('Number of Bedrooms') }}" required>
                    </div>

                    <div>
                        <label for="bathrooms" class="block mb-2 text-xl font-medium text-gray-900">{{ __("Number of Bathrooms") }}</label>
                        <input type="number" name="bathrooms" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="{{ __('Number of Bathrooms') }}" required>
                    </div>
                    
                    <div>
                        <label for="site" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Site") }}</label>
                        <input type="text" id="site" name="site" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Site">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("E-mail") }}</label>
                        <input type="email" id="email" name="email" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="E-mail" required>
                    </div>
                    <div>
                        <label for="tel" class="block mb-2 text-xl font-medium text-gray-900">{{ __("Tel Number (Japan)") }}</label>
                        <input type="tel" id="tel" name="tel" pattern="[0-9]{2,4}-[0-9]{2,4}-[0-9]{4}" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0000-0000-0000">
                    </div>
                </div>
                <div class="w-full text-center block mb-2 text-xl font-medium text-gray-900">
                    {{ __("Images") }}
                    <p class="mt-1 text-sm text-gray-700 " id="file_input_help">{{ __("PNG and JPG (2mb Max)") }}</p>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-6">
                    <div>
                        <input type="file" name="images[]" accept="image/png, image/jpeg" multiple required>
                    </div>
                    <div>
                        <input type="file" name="images[]" accept="image/png, image/jpeg" multiple>
                    </div>
                    <div>
                        <input type="file" name="images[]" accept="image/png, image/jpeg" multiple>
                    </div>
                    <div>
                        <input type="file" name="images[]" accept="image/png, image/jpeg" multiple>
                    </div>
                    <div>
                        <input type="file" name="images[]" accept="image/png, image/jpeg" multiple>
                    </div>
                    <div>
                        <input type="file" name="images[]" accept="image/png, image/jpeg" multiple>
                    </div>
                </div>

                <div class="grid gap-6 mb-6 md:grid-cols-2  mt-6">
                    <div>
                        <label for="price" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Price (Iene)") }}</label>
                        <input type="number" step="0.01" name="price" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="{{ __('Price') }}" required>
                    </div>

                    <div>
                        <label for="pri_type" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Price Time Type") }}</label>
                        <select name="pri_type" id="pri_type" name="pri_type" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            @foreach ($pritype as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach  
                        </select>
                    </div>

                    <div>
                        <label for="location" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Location") }}</label>
                        <select name="location" id="location" name="location" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            @foreach ($locations as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="ad_type" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Ad Type") }}</label>
                        <select name="ad_type" id="ad_type" name="ad_type" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            @foreach ($adtype as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="pro_type" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Property Type") }}</label>
                        <select name="pro_type" id="pro_type" name="pro_type" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            @foreach ($protype as $option)
                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                            @endforeach  
                        </select>
                    </div>

                </div>
                <button type="submit" class="bg-green-600 py-2 text-white font-medium text-center px-10 md:px-14 py-1 md:py-2 text-lg md:text-xl rounded hover:bg-green-500 hover:bg-green-500 hover:text-black duration-700">{{ __("Create Ad") }}</button>
            </form>
        </div>
    </div>
@endsection