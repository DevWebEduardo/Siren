@extends('layouts.main')
@section('title', 'Siren - '. $ad->title)

@section('content')
    <div class="w-full bg-slate-300 lg:mt-2 rounded py-4 px-2">
        <p class="text-center mt-4 text-2xl lg:text-3xl font-medium">{{ $ad->title }}</p>
        <div class="flex flex-col xl:flex-row my-6">
            <div class="flex flex-wrap w-full xl:w-6/12 justify-center items-center">
                @foreach (json_decode($ad->images) as $image)
                    <img src="/assets/images/ads/{{$image}}" class="cursor-pointer hover:opacity-95 m-2 w-full sm:w-2/12 min-w-[290px] md:min-w-[300px] rounded h-auto object-contain images border border-slate-400 hover:border-slate-800 border-4">
                @endforeach
            </div>
            <div class="w-full xl:w-6/12">
                <p class="lg:hidden text-xl md:text-2xl">{{ $ad->description }}</p>
                <div class="text-2xl my-4 xl:my-2">
                    <p class="pt-2">
                        <i class="fa-solid fa-igloo"></i>
                        {{ $ad->pro_type_name }}
                    </p>
                    <p class="pt-2">
                        <i class="fa-solid fa-map-location"></i>
                        {{ $ad->location_name }}
                    </p>
                    <p class="pt-2">
                        <i class="fa-solid fa-sink"></i>
                        {{$ad->bathrooms}} {{ __("Bathrooms") }}
                    </p>
                    <p class="pt-2">
                        <i class="fa-solid fa-bed"></i>
                        {{$ad->bedrooms}} {{ __("Bedrooms") }}
                    </p>
                    <p class="pt-2">
                        <i class="fa-solid fa-money-bill"></i>
                        {{$ad->price}}¥ 
                            @if ($ad->ad_type != 1)
                                [{{ $ad->pri_type_name }}]
                            @endif
                    </p>
                    <p class="pt-2">
                        <i class="fa-solid fa-file-contract"></i>
                        {{ $ad->ad_type_name }}
                    </p>
                    <div class="w-full mt-4 lg:mt-8">
                        <div class="text-center w-11/12 mx-auto rounded bg-slate-400 p-2">
                            <p>
                                <i class="fa-solid fa-phone"></i>
                                {{ $ad->tel }}
                            </p>
                            <p class="pt2">
                                <i class="fa-solid fa-link"></i>
                                {{ $ad->site }}
                            </p>
                            <p class="pt2">
                                <i class="fa-solid fa-envelope"></i>
                                {{ $ad->email }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="w-full hidden lg:block px-6 my-4 text-2xl">{!! nl2br(e($ad->description)) !!}</p>
    </div>
    <div class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50 hidden" id="imageModal">
        <div class="bg-white p-4 w-full lg:w-4/12 mx-auto rounded-lg">
            <img src="" alt="Image" class="w-full h-auto object-contain" id="modalImage">
        </div>
    </div>
    <script>
        const images = document.querySelectorAll('.images');
        const imageModal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');

        images.forEach(image => {
            image.addEventListener('click', () => {
                modalImage.src = image.src;
                imageModal.classList.remove('hidden');
            });
        });

        imageModal.addEventListener('click', (event) => {
            if (event.target === imageModal) {
                imageModal.classList.add('hidden');
            }
        });
    </script>
@endsection
