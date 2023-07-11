@extends('layouts.main')
@section('title','Siren')
@section('content')
    @if(count($ads)==0)
        <div class="flex flex-col justify-center items-center w-full h-80 my-4">
            <p class="w-full text-center text-3xl xl:text-5xl mb-2">乁( ⁰͡ Ĺ̯ ⁰͡ ) ㄏ</p>
            <p class="w-full text-center text-2xl xl:text-4xl">{{ __("Your search returned no results") }}</p>
        </div>
    @else
        @foreach ($ads as $ad)
            <!-- Card -->
                @php
                    $images = json_decode($ad->images);
                @endphp
                <div class="flex flex-col sm:flex-row mb-2 bg-slate-400 rounded">
                    <div class="sm:w-5/12 p-2">
                        <div class="flex justify-center items-center w-full py-2 text-3xl">
                            <i class="fa-solid fa-igloo"></i>
                            <p class="ml-2 text-xl"> {{ $ad->pro_type_name }}</p>
                        </div>
                        <img src="/assets/images/ads/{{ $images[0] }}" class="mx-auto rounded w-full sm:w-5/6 md:w-full sm:w-auto">
                        <div class="flex justify-center items-center w-full py-2 text-3xl">
                            <i class="fa-solid fa-map-location"></i>
                            <p class="ml-2 text-xl"> {{ $ad->location_name }}</p>
                        </div>
                    </div>
                    <div class="sm:w-7/12 mx-auto sm:py-2">
                        <a href="/ad/{{ $ad->slug }}" class="flex justify-center w-full mt-2 md:mt-4 text-xl md:text-2xl font-medium">
                             {{ $ad->title }}
                        </a>
                        <p class="text-lg sm:text-xl py-3 px-2 mx-auto">
                            {{ substr($ad->description, 0, 120) }}[...]
                        </p>
                        <div class="flex flex-wrap mt-2 px-2">
                            <p class="text-xl w-full md:w-3/6"><i class="fa-solid fa-sink"></i>{{$ad->bathrooms}} {{ __("Bathrooms") }}</p>
                            <p class="text-xl w-full md:w-3/6"><i class="fa-solid fa-bed"></i>{{$ad->bedrooms}} {{ __("Bedrooms") }}</p>
                            <p class="text-xl w-full md:w-3/6"><i class="fa-solid fa-money-bill"></i>
                            {{$ad->price}}¥ 
                            @if ($ad->ad_type != 1)
                                [{{ $ad->pri_type_name }}]
                            @endif
                        </p>
                            <p class="text-xl w-full md:w-3/6"><i class="fa-solid fa-file-contract"></i> {{ $ad->ad_type_name }}</p>
                        </div>
                        <div class="flex justify-center mt-8 md:mt-14">
                            <a href="/ad/{{ $ad->slug }}" class="bg-green-600 text-white font-medium text-center px-10 md:px-14 py-1 md:py-2 text-lg md:text-xl rounded hover:bg-green-500 hover:bg-green-500 hover:text-black duration-700">
                                {{ __("More Informations") }}
                            </a>
                        </div>
                        <p class="flex justify-center py-2">{{ __("Posted") }} {{ $ad->created_at->format('Y-m-d') }}</p>
                    </div>
                </div>
            <!-- End of the Card -->
        @endforeach
    @endif
    @if (count($ads) > 0)
        <p class="text-center flex flex-wrap pt-4 justify-center">
            <a href="{{ $ads->previousPageUrl() }}" class="text-2xl m-1 rounded bg-blue-300 text-gray-800 py-2 px-4 xl:text-3xl hover:bg-blue-400 duration-700">&lt;</a>
            @foreach ($ads->getUrlRange(1, $ads->lastPage()) as $page => $url)
                <a href="{{ $url }}" class="text-2xl m-1 rounded bg-blue-300 text-gray-800 py-2 px-4 xl:text-3xl hover:bg-blue-400 duration-700">{{ $page }}</a>
            @endforeach
            <a href="{{ $ads->nextPageUrl() }}" class="text-2xl m-1 rounded bg-blue-300 text-gray-800 py-2 px-4 xl:text-3xl hover:bg-blue-400 duration-700">&gt;</a>
        </p>
    @endif
@endsection