@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="flex justify-center flex-col mb-6 p-4 md:rounded bg-gradient-to-r from-blue-300 to-green-300">
        <div class="font-medium text-center text-lg sm:text-xl lg:text-2xl text-gray-900">
            <p class="text-4xl">°˖✧◝(⁰▿⁰)◜✧˖°</p>
            {{ __('Hello') }} {{ Auth::user()->name }}
        </div>   
    </div>

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

    <div class="bg-blue-200 w-full p-2 md:p-4 md:rounded md:container">
        
        <div class="flex  w-full pb-4">
            <a href="/ad/create" class="mx-auto">
                <button class="bg-green-600 text-white font-medium text-center px-10 md:px-14 py-1 md:py-2 text-lg md:text-xl rounded hover:bg-green-500 hover:bg-green-500 hover:text-black duration-700">New Ad</button>
            </a>
        </div>
        @foreach($ads as $ad)
        @php
            $images = json_decode($ad->images);
        @endphp
        <!-- Card Start -->
                <div class="">
                    <div class="flex flex-wrap pt-4 lg:pt-8 px-2 md:px-4 lg:px-8 bg-blue-300 rounded">
                        <div class="w-full flex justify-center items-center lg:w-2/5 ">
                            <a href="/ad/edit/{{ $ad->id }}" class="border-solid border-blue-400 border-4 mb-8 lg:h-auto bg-slate-800">
                                <img src="/assets/images/ads/{{ $images[0] }}" class="h-48 sm:h-60 md:h-72 w-full hover:opacity-80 object-contain">
                            </a>
                            </div>
                            <div class="w-full px-2 lg:w-3/5">
                                <h3 class="text-2xl text-center font-medium m-3 xl:text-3xl">
                                <a href="/ad/edit/{{ $ad->id }}" class="hover:text-gray-800 hover:underline">
                                    {{ $ad->title }}
                                </a>
                            </h3>
                            <p class="text-xl">
                                <a href="/ad/edit/{{ $ad->id }}" class="hover:text-gray-800 text-md md:text-lg text-center lg:text-xl hover:underline">{{ substr($ad->description, 0, 150) }}[...]</a>
                            </p>
                            <p class="text-center m-6">
                                <a href="/ad/edit/{{ $ad->id }}" class="bg-green-600 m-2 px-6 py-2 text-xl rounded text-white hover:bg-green-500 hover:text-gray-900">{{ __("Edit") }} </a>
                                <a href="/ad/delete/{{ $ad->id }}" class="bg-red-500 m-2 px-6 py-2 text-xl rounded text-white hover:bg-red-400 hover:text-gray-900">{{ __("Delete") }} </a>
                            </p>
                            <p class="h-full text-center text-xl m-6">
                                {{ __("Posted") }} {{ $ad->created_at }}
                            </p>
                        </div>
                    </div>
                </div>
        <!-- Card End -->        
        @endforeach
        <p class="text-center flex flex-wrap pt-4 justify-center">
            <a href="" class="text-2xl m-1 rounded bg-blue-300 text-gray-800 py-2 px-4 xl:text-3xl hover:bg-blue-400 duration-700">&lt;</a>
            <a href="" class="text-2xl m-1 rounded bg-blue-300 text-gray-800 py-2 px-4 xl:text-3xl hover:bg-blue-400 duration-700">1</a>
            <a href="" class="text-2xl m-1 rounded bg-blue-300 text-gray-800 py-2 px-4 xl:text-3xl hover:bg-blue-400 duration-700">2</a>
            <a href="" class="text-2xl m-1 rounded bg-blue-300 text-gray-800 py-2 px-4 xl:text-3xl hover:bg-blue-400 duration-700">&gt;</a>
        </p>
    </div>
@endsection