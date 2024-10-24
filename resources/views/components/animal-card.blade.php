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
    <img src="{{ asset($image) }}" alt="{{ $animal_name }}" class="w-full h-48 object-cover">
    <div class="p-4">
        <h3 class="font-bold text-lg">{{ $animal_name }}</h3>
        <p class="text-gray-600"><strong>Scientific Name:</strong> {{ $scientific_name }}</p>
        <p class="mt-2 text-gray-700">{{ $description }}</p>
        <p class="mt-2 text-gray-600"><strong>Behavioral Notes:</strong> {{ $behavioral_notes }}</p>
        <p class="mt-2 text-gray-600"><strong>Lifespan:</strong> {{ $lifespan }}</p>
        <p class="mt-2 text-gray-600"><strong>Diet:</strong> {{ $diet }}</p>
        <p class="mt-2 text-gray-600"><strong>Social Structure:</strong> {{ $social_structure }}</p>
        <p class="mt-2 text-gray-600"><strong>Threats:</strong> {{ $threats }}</p>
        <p class="mt-2 text-gray-600"><strong>Primary Predator:</strong> {{ $primary_predator }}</p>
    </div>
</div>