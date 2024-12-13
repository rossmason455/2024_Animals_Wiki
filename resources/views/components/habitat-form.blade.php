@props(['action', 'method'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- habitat Name -->
    <div class="mb-4">
        <label for="habitat_name" class="block text-sm text-gray-700">Habitat Name</label>
        <input type="text" name="habitat_name" id="habitat_name"
            value="{{ old('habitat_name', $habitat->habitat_name ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('habitat_name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>



    <!-- description -->
    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>
        <textarea name="description" id="description"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('description', $habitat->description ?? '') }}</textarea>
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Climate -->
    <div class="mb-4">
        <label for="climate" class="block text-sm text-gray-700">Climate</label>
        <textarea name="climate" id="climate"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('climate', $habitat->climate ?? '') }}</textarea>
        @error('climate')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>








    <!-- habitat Image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">habitat Image</label>
        <input type="file" name="image" id="image" {{ isset($habitat) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($habitat->image_url)
        <div class="mb-4">
            <img src="{{ asset($habitat->image_url) }}" alt="habitat image" class="w-24 h-32 object-cover" />
        </div>
    @endisset

    <!-- Submit Button -->
    <div>
        <x-primary-button>
            {{ isset($habitat) ? 'Update habitat' : 'Add habitat' }}
        </x-primary-button>
    </div>
</form>