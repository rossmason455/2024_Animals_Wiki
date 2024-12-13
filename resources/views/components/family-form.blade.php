@props(['action', 'method'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <!-- Family Name -->
    <div class="mb-4">
        <label for="family_name" class="block text-sm text-gray-700">Family Name</label>
        <input type="text" name="family_name" id="family_name"
            value="{{ old('family_name', $family->family_name ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('family_name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>



    <!-- Characteristics -->
    <div class="mb-4">
        <label for="characteristics" class="block text-sm text-gray-700">Characteristics</label>
        <textarea name="characteristics" id="characteristics"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('characteristics', $family->characteristics ?? '') }}</textarea>
        @error('characteristics')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Evolutionary Origin -->
    <div class="mb-4">
        <label for="evolutionary_origin" class="block text-sm text-gray-700">Evolutionary Origin</label>
        <textarea name="evolutionary_origin" id="evolutionary_origin"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('evolutionary_origin', $family->evolutionary_origin ?? '') }}</textarea>
        @error('evolutionary_origin')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>








    <!-- Family Image -->
    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-gray-700">Family Image</label>
        <input type="file" name="image" id="image" {{ isset($family) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($family->image_url)
        <div class="mb-4">
            <img src="{{ asset($family->image_url) }}" alt="Family image" class="w-24 h-32 object-cover" />
        </div>
    @endisset


    <!-- Submit Button -->
    <div>
        <x-primary-button>
            {{ isset($family) ? 'Update family' : 'Add family' }}
        </x-primary-button>
    </div>
</form>