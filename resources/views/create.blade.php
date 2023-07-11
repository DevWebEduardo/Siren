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
            <form action="/ad{{ ($id ?? '') }}" method="POST" enctype="multipart/form-data" class="w-full justify-center items-center text-center">
                @csrf
                @method($method)
                <div class="mb-6">
                    <label for="title" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Title") }}</label>
                    <input type="text" id="title" name="title" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="{{ __('Title') }}" value="{{ $ad->title ?? '' }}" required>
                </div> 
                <div class="mb-6">
                    <label for="description" class="block mb-2 text-xl font-medium text-gray-900">{{ __("Description") }}</label>
                    <textarea id="description" name="description" class="border-2 border-blue-400 h-48 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="{{ __('Description') }}" required>{{$ad->description ?? ''}}</textarea>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2 mt-6">
                    <div>
                        <label for="bedrooms" class="block mb-2 text-xl font-medium text-gray-900">{{ __("Number of Bedrooms") }}</label>
                        <input type="number" name="bedrooms" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="{{ __('Number of Bedrooms') }}" value="{{ $ad->bedrooms ?? '' }}" required>
                    </div>
                    
                    <div>
                        <label for="bathrooms" class="block mb-2 text-xl font-medium text-gray-900">{{ __("Number of Bathrooms") }}</label>
                        <input type="number" name="bathrooms" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="{{ __('Number of Bathrooms') }}" value="{{ $ad->bathrooms ?? '' }}" required>
                    </div>
                    
                    <div>
                        <label for="site" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Site") }}</label>
                        <input type="text" id="site" name="site" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Site"  value="{{ $ad->site ?? '' }}">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("E-mail") }}</label>
                        <input type="email" id="email" name="email" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="E-mail" value="{{ $ad->email ?? '' }}" required>
                    </div>
                    <div>
                        <label for="tel" class="block mb-2 text-xl font-medium text-gray-900">{{ __("Tel Number (Japan)") }}</label>
                        <input type="tel" id="tel" name="tel" pattern="[0-9]{2,4}-[0-9]{2,4}-[0-9]{4}" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="0000-0000-0000" value="{{ $ad->tel ?? '' }}">
                    </div>
                </div>
                <div class="w-full text-center block mb-2 text-xl font-medium text-gray-900">
                    {{ __("Images") }}
                    <p class="mt-1 text-sm text-gray-700 " id="file_input_help">{{ __("PNG and JPG (2mb Max)") }}</p>
                </div>


                <div class="flex gap-6 mt-4 mb-6 justify-center items-center" id="imagesReady">
 
                </div>


                <div class="w-full mx-auto">
                    <div class="container mx-auto h-full flex flex-col justify-center items-center">
                        <div id="images-container"></div>
                        <div class="flex w-full justify-center">
                            <div id="multi-upload-button"
                                class="inline-flex items-center px-4 py-2 bg-gray-600 border border-gray-600 rounded-l font-semibold cursor-pointer text-sm text-white tracking-widest hover:bg-gray-500 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition ">
                                {{ __("Click to browse") }}
                            </div>
                            <div class="w-4/12 lg:w-3/12 border border-gray-300 rounded-r-md flex items-center justify-between bg-white">
                                <span id="multi-upload-text" class="p-2"></span>
                                <button id="multi-upload-delete" class="hidden" onclick="removeMultiUpload(event); return false;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="fill-current text-red-700 w-3 h-3"
                                        viewBox="0 0 320 512">
                                        <path
                                                d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                        <input type="file" id="images" name="images[]" accept="image/png, image/jpeg" class="hidden" multiple/>
                    </div>
                </div>

                <div class="grid gap-6 mb-6 md:grid-cols-2  mt-6">
                    <div>
                        <label for="price" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Price (Iene)") }}</label>
                        <input type="number" step="0.01" name="price" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="{{ __('Price') }}"  value="{{ $ad->price ?? '' }}"required>
                    </div>

                    <div>
                        <label for="pri_type" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Price Time Type") }}</label>
                        <select name="pri_type" id="pri_type" name="pri_type" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            @foreach ($pritype as $option)
                                <option value="{{ $option->id }}" {{ isset($ad->pri_type) && $ad->pri_type == $option->id ? 'selected' : '' }}>
                                    {{ $option->name }}
                                </option>
                            @endforeach  
                        </select>
                    </div>

                    <div>
                        <label for="location" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Location") }}</label>
                        <select name="location" id="location" name="location" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            @foreach ($locations as $option)
                                <option value="{{ $option->id }}" {{ isset($ad->location) && $ad->location == $option->id ? 'selected' : '' }}>
                                        {{ $option->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="ad_type" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Ad Type") }}</label>
                        <select name="ad_type" id="ad_type" name="ad_type" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            @foreach ($adtype as $option)
                                <option value="{{ $option->id }}" {{ isset($ad->ad_type) && $ad->ad_type == $option->id ? 'selected' : '' }}>
                                        {{ $option->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="pro_type" class="block mb-2 text-xl font-medium text-gray-900 ">{{ __("Property Type") }}</label>
                        <select name="pro_type" id="pro_type" name="pro_type" class="border-2 border-blue-400 border-gray-700 bg-blue-50 border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                            @foreach ($protype as $option)
                                <option value="{{ $option->id }}" {{ isset($ad->pro_type) && $ad->pro_type == $option->id ? 'selected' : '' }}>
                                        {{ $option->name }}
                                </option>
                            @endforeach  
                        </select>
                    </div>

                </div>
                <button type="submit" class="bg-green-600 py-2 text-white font-medium text-center px-10 md:px-14 py-1 md:py-2 text-lg md:text-xl rounded hover:bg-green-500 hover:bg-green-500 hover:text-black duration-700">
                    @if($method=='PUT') 
                        {{ __("Create Ad") }}
                    @else
                        {{ __("Update Ad") }}
                    @endif
                </button>
            </form>
            @if ($ad->images ?? '')
                <div class="hidden" id="imagesDb">
                    @foreach(json_decode($ad->images) as $image)
                        <img src="/assets/images/ads/{{ $image }}" class="h-52 w-auto bg-slate-800 p-1 rounded">
                    @endforeach
                    <input type="text" name="imgAlt" value="false" hidden>
                </div>
            @endif
        </div>
    </div>
    <script>
        multiUploadButton = document.getElementById("multi-upload-button");
        multiUploadInput = document.getElementById("images");
        imagesContainer = document.getElementById("images-container");
        multiUploadDisplayText = document.getElementById("multi-upload-text");
        multiUploadDeleteButton = document.getElementById("multi-upload-delete");
        imagesReady = document.getElementById('imagesReady');
        imagesDb = document.getElementById('imagesDb') || false;

        multiUploadButton.onclick = function () {
            multiUploadInput.click(); // this will trigger the click event
        };

        multiUploadInput.addEventListener('change', function (event) {
            checkImgEdit(); //Show or not past images
            if (multiUploadInput.files) {
                let files = multiUploadInput.files;

                // Filter only image files
                let imageFiles = Array.from(files).filter(file => file.type.startsWith('image/'));

                if (imageFiles.length === 0) {
                    // No image files selected
                    return;
                }
                
                // show the text for the upload button text filed
                multiUploadDisplayText.innerHTML = imageFiles.length + ' image(s) selected';

                // removes styles from the images wrapper container in case the user re-adds new images
                imagesContainer.innerHTML = '';
                imagesContainer.classList.remove("w-full", "grid", "grid-cols-1", "sm:grid-cols-2", "md:grid-cols-3", "lg:grid-cols-4", "gap-4");

                // add styles to the images wrapper container
                imagesContainer.classList.add("w-full", "grid", "grid-cols-1", "sm:grid-cols-2", "md:grid-cols-3", "lg:grid-cols-4", "gap-4");

                // the delete button to delete all files
                multiUploadDeleteButton.classList.add("z-100", "p-2", "my-auto");
                multiUploadDeleteButton.classList.remove("hidden");

                imageFiles.forEach(function (file) {
                    // the FileReader object is needed to display the image
                    let reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        // for each file we create a div to contain the image
                        let imageDiv = document.createElement('div');
                        imageDiv.classList.add("h-64", "mb-3", "w-full", "p-3", "rounded-lg", "bg-cover", "bg-center");
                        imageDiv.style.backgroundImage = 'url(' + reader.result + ')';
                        imagesContainer.appendChild(imageDiv);
                    }
                });
            }
        });

        function checkImgEdit() {
            let files = multiUploadInput.files;
            let imageFiles = Array.from(files).filter(file => file.type.startsWith('image/'));
            if (imageFiles.length === 0) {
                if (imagesDb !== false) {
                    imagesReady.innerHTML = imagesDb.innerHTML;
                }
            } else {
                imagesReady.innerHTML = "";
            }
        }

        checkImgEdit();

        function removeMultiUpload(event) {
            event.preventDefault();
            imagesContainer.innerHTML = '';
            imagesContainer.classList.remove("w-full", "grid", "grid-cols-1", "sm:grid-cols-2", "md:grid-cols-3", "lg:grid-cols-4", "gap-4");
            multiUploadInput.value = '';
            multiUploadDisplayText.innerHTML = '';
            multiUploadDeleteButton.classList.add("hidden");
            multiUploadDeleteButton.classList.remove("z-100", "p-2", "my-auto");
            checkNew();
        }
    </script>
@endsection