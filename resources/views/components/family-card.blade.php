@props([
    'family_name',
    'characteristics',
    'evolutioany_origin',
    'image'
])

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ asset($image) }}" alt="{{ $family_name }}" class="w-full object-cover">
    <div class="p-4">
        <h3 class="font-bold text-lg">{{ $family_name }}</h3>

    </div>
</div>