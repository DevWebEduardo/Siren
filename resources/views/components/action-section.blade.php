<div class="md:grid md:grid-cols-3 md:gap-6">
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    <div class="mb-5 md:mt-0 md:col-span-2">
        <div class="px-4 py-5 sm:p-6 shadow sm:rounded-lg bg-blue-50">
            {{ $content }}
        </div>
    </div>
</div>
