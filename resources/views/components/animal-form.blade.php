props(['action', 'method'])





<form action="{{$action}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
    @method($method)
    @endif

    <div class="mb-4">
        <label for="animal_name" class="block text-sm text-gray-700">Animal Name</label>
        <input type="text" name="animal_name" id="animal_name"
            value="{{ old('animal_name', $animal->animal_name ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />
        @error('animal_name')
        <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-hray-700">Animal Image</label>
        <input type="file" name="image" id="image" {{isset($animal) ? : 'required'}}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
        @error('image')
        <p class="text-sm text-red-600">{{$message}}</p>
        @enderror
    </div>
    @isset ($animal->image)
    <div class="mb-4"> img src="{{asset ($animal->image)}}" alt="Animal image" class="w-24 h-32 object-cover">


    </div>
    @endisset

    <div>
        <x-primary-button>
            {{isset ($animal) ? 'Update Animal':'Add Animal'}}
        </x-primary-button>
    </div>
</form>