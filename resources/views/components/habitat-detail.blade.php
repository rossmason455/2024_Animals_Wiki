


@props([
'habitat_name',
'description',
'habitat_image',
'climate',
'created_at',
'updated_at'
])



<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
    <!-- Image -->
    <img src="{{ asset($habitat_image) }}" alt="{{ $habitat_name }}" class="w-full h-64 object-cover">

    <!-- Content -->
    <div class="p-6">
        <!-- Animal Name -->
        <h1 class="text-3xl font-bold mb-2 text-gray-800">{{ $habitat_name }}</h1>


        <!-- Description -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Description</h2>
        <p class="text-gray-600 mb-4">{{ $description }}</p>

        <!-- Behavioral Notes -->
        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Climate</h2>
        <p class="text-gray-600 mb-4">{{ $climate }}</p>


    </div>
</div>