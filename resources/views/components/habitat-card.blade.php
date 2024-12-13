@props([
    'habitat_name',
    'description',
    'climate',
    'image'
])

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ asset($image) }}" alt="{{ $habitat_name }}" class="w-full object-cover">
    <div class="p-4">
        <h3 class="font-bold text-lg">{{ $habitat_name }}</h3>

    </div>
</div>