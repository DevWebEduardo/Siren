@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-2 border-blue-400 border-gray-700 focus:border-indigo-800 focus:ring-indigo-700 bg-white py-1 px-2 h-10 rounded-md shadow-sm']) !!}>
