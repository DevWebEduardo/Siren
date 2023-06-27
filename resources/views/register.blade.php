@extends('layouts.login')

@section('title','Register')
@section('content')
            <img src="/assets/images/logo.png" alt="logo" class=" w-4/12 sm:w-3/12 lg:w-2/12 mx-auto mt-6">
            <p class=" sm:pb-4 mx-auto text-3xl md:text-3xl lg:text-4xl xl:text-5xl text-center mb-3">Siren</p>
            <form method="POST" action="/register" class="flex bg-emerald-300 p-6 w-11/12 sm:w-9/12 md:w-8/12 flex-col rounded mx-auto text-gray-700 text-lg md:text-xl">
                @csrf
                <label for="">{{ __('Name') }}</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" class="p-2 my-2 h-10 rounded text-black">
                <label for="">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" class="p-2 my-2 h-10 rounded text-black">
                <label for="password">{{ __('Password') }}</label>
                <input id="password" type="password" name="password" required autocomplete="new-password" class="p-2 my-2 h-10 rounded text-black">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"  class="p-2 my-2 h-10 rounded text-black">
                <p class="text-center mx-auto mt-2">
                    <input type="checkbox" name="terms" id="terms" required class="w-5 h-5 mx-2">
                    {{ __('I accept the') }}&nbsp;<a href="/terms" class="underline">{{ __('Terms of Service') }}</a>&nbsp;{{ __('and the') }}&nbsp;<a href="/data-policy" class="underline">{{ __('Data Policy.') }}</a>
                </p>
                <button class="mt-7 mx-auto w-5/6 sm:w-3/6 md:w-2/6 bg-blue-400 py-3 sm:py-4 rounded hover:bg-blue-500 duration-700 font-medium">{{  __('Register') }}</button>
                @if ($errors->any())
                    <div>
                        <div>{{ __('Whoops! Something went wrong.') }}</div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </form>
            <nav class="mx-auto md:pr-4 w-8/12 pb-8 flex justify-center md:justify-end items-center">
                <a href="/">
                    <button class="px-8 py-1 md:py-2 text-lg md:text-xl bg-blue-400 rounded text-gray-700 font-medium hover:bg-blue-500 duration-700 rounded-t-none">Home</button>
                </a>
            </nav>
            
@endsection