@extends('layouts.login')
@section('title', 'Forgot Password')
@section('content')
<x-authentication-card>
        <div class="mb-4 text-slate-900 text-lg sm:text-xl">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>


        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <button type="submit" class="bg-green-600 text-white font-medium text-center px-10 md:px-14 py-1 md:py-2 text-lg md:text-xl rounded hover:bg-green-500 hover:text-black duration-700">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </x-authentication-card>
@endsection


