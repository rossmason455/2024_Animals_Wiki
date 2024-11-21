@props([
'animal_name',
'scientific_name',
'description',
'behavioral_notes',
'lifespan',
'diet',
'social_structure',
'threats',
'primary_predator',
'image'
])

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <img src="{{ asset($image) }}" alt="{{ $animal_name }}" class="w-full object-cover">
    <div class="p-4">
        <h3 class="font-bold text-lg">{{ $animal_name }}</h3>

    </div>
</div>