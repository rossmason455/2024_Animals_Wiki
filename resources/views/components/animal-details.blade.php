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
'image',
'created_at',
'updated_at'
])

<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <!-- Image -->
    <img src="{{ asset($image) }}" alt="{{ $animal_name }}" class="w-full h-64 object-cover">

    <!-- Content -->
    <div class="p-6">
        <!-- Animal Name -->
        <h1 class="text-3xl font-bold mb-2 text-gray-800">{{ $animal_name }}</h1>
        <p class="text-xl italic text-gray-500 mb-4">{{ $scientific_name }}</p>

        <!-- Description -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Description</h2>
        <p class="text-gray-600 mb-4">{{ $description }}</p>

        <!-- Behavioral Notes -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Behavioral Notes</h2>
        <p class="text-gray-600 mb-4">{{ $behavioral_notes }}</p>

        <!-- Lifespan -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Lifespan</h2>
        <p class="text-gray-600 mb-4">{{ $lifespan }}</p>

        <!-- Diet -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Diet</h2>
        <p class="text-gray-600 mb-4">{{ $diet }}</p>

        <!-- Social Structure -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Social Structure</h2>
        <p class="text-gray-600 mb-4">{{ $social_structure }}</p>

        <!-- Threats -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Threats</h2>
        <p class="text-gray-600 mb-4">{{ $threats }}</p>

        <!-- Primary Predator -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Primary Predator</h2>
        <p class="text-gray-600 mb-4">{{ $primary_predator }}</p>

        <!-- Timestamps -->
        <p class="text-gray-500 text-sm mt-4">Created: {{ $created_at }}</p>
        <p class="text-gray-500 text-sm">Updated: {{ $updated_at }}</p>
    </div>
</div>