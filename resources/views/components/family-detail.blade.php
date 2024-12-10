@props([
'family_name',
'characteristics',
'evolutionary_origin',
'image',
'created_at',
'updated_at'
])

<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <!-- Image -->
    <img src="{{ asset($image) }}" alt="{{ $family_name }}" class="w-full h-64 object-cover">

    <!-- Content -->
    <div class="p-6">
        <!-- Animal Name -->
        <h1 class="text-3xl font-bold mb-2 text-gray-800">{{ $family_name }}</h1>


        <!-- Description -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Characteristics</h2>
        <p class="text-gray-600 mb-4">{{ $characteristics }}</p>

        <!-- Behavioral Notes -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Evolutionary Origin</h2>
        <p class="text-gray-600 mb-4">{{ $evolutionary_origin }}</p>


    </div>
</div>