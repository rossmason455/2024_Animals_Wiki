@props(['action', 'method'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Animal Name -->
    <div class="mb-4">
        <label for="animal_name" class="block text-sm text-gray-700">Animal Name</label>
        <input type="text" name="animal_name" id="animal_name"
            value="{{ old('animal_name', $animal->animal_name ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('animal_name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Scientific Name -->
    <div class="mb-4">
        <label for="scientific_name" class="block text-sm text-gray-700">Scientific Name</label>
        <input type="text" name="scientific_name" id="scientific_name"
            value="{{ old('scientific_name', $animal->scientific_name ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('scientific_name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description -->
    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <textarea name="description" id="description"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $animal->description ?? '') }}</textarea>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Behavioral Notes -->
    <div class="mb-4">
        <label for="behavioral_notes" class="block text-sm text-gray-700">Behavioral Notes</label>
        <textarea name="behavioral_notes" id="behavioral_notes"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('behavioral_notes', $animal->behavioral_notes ?? '') }}</textarea>
        @error('behavioral_notes')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Lifespan -->
    <div class="mb-4">
        <label for="lifespan" class="block text-sm text-gray-700">Lifespan</label>
        <input type="text" name="lifespan" id="lifespan" value="{{ old('lifespan', $animal->lifespan ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('lifespan')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Diet -->
    <div class="mb-4">
        <label for="diet" class="block text-sm text-gray-700">Diet</label>
        <textarea name="diet" id="diet"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('diet', $animal->diet ?? '') }}</textarea>
        @error('diet')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Social Structure -->
    <div class="mb-4">
        <label for="social_structure" class="block text-sm text-gray-700">Social Structure</label>
        <textarea name="social_structure" id="social_structure"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('social_structure', $animal->social_structure ?? '') }}</textarea>
        @error('social_structure')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Threats -->
    <div class="mb-4">
        <label for="threats" class="block text-sm text-gray-700">Threats</label>
        <textarea name="threats" id="threats"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('threats', $animal->threats ?? '') }}</textarea>
        @error('threats')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Primary Predator -->
    <div class="mb-4">
        <label for="primary_predator" class="block text-sm text-gray-700">Primary Predator</label>
        <input type="text" name="primary_predator" id="primary_predator"
            value="{{ old('primary_predator', $animal->primary_predator ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('primary_predator')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    <!-- Family id -->
    <div class="mb-4">
        <label for="family_id" class="block text-sm text-gray-700">Family id</label>
        <input type="text" name="family_id" id="family_id" value="{{ old('family_id', $animal->family_id ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('family_id')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    <div class="mb-4">
        <label for="habitat_id" class="block text-sm text-gray-700">Habitat id</label>
        <input type="text" name="habitat_id" id="habitat_id" value="{{ old('habiat_id', $animal->family_id ?? '') }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('habitat_id')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Animal Image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Animal Image</label>
        <input type="file" name="image" id="image" {{ isset($animal) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($animal->image_url)
        <div class="mb-4">
            <img src="{{ asset($animal->image_url) }}" alt="Animal image" class="w-24 h-32 object-cover" />
        </div>
    @endisset





    <!-- Submit Button -->
    <div>
        <x-primary-button>
            {{ isset($animal) ? 'Update Animal' : 'Add Animal' }}
        </x-primary-button>
    </div>
</form>