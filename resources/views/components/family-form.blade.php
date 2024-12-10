@props(['action', 'method'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
    @method($method)
    @endif

    <!-- family Name -->
    <div class="mb-4">
        <label for="family_name" class="block text-sm text-gray-700">family Name</label>
        <input type="text" name="family_name" id="family_name"
            value="{{ old('family_name', $family->family_name ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('family_name')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>



    <!-- characteristics -->
    <div class="mb-4">
        <label for="characteristics" class="block text-sm text-gray-700">characteristics</label>
        <textarea name="characteristics" id="characteristics"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('characteristics', $family->characteristics ?? '') }}</textarea>
        @error('characteristics')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Behavioral Notes -->
    <div class="mb-4">
        <label for="evolutionary_origin" class="block text-sm text-gray-700">Behavioral Notes</label>
        <textarea name="evolutionary_origin" id="evolutionary_origin"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('evolutionary_origin', $family->evolutionary_origin ?? '') }}</textarea>
        @error('evolutionary_origin')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>








    @isset($family->image_url)
    <div class="mb-4">
        <img src="{{ asset($family->image_url) }}" alt="family image" class="w-24 h-32 object-cover" />
    </div>
    @endisset

    <!-- Submit Button -->
    <div>
        <x-primary-button>
            {{ isset($family) ? 'Update family' : 'Add family' }}
        </x-primary-button>
    </div>
</form>