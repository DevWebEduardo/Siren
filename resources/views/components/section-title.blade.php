<div class="md:col-span-1 flex justify-center items-center">
    <div class="px-4 py-2 sm:px-0">
        <h3 class="text-xl font-medium text-gray-900 text-center">{{ $title }}</h3>

        <p class="mt-1 text-md sm:text-lg text-gray-700 text-center">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>