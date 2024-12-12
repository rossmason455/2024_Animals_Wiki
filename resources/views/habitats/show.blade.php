<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $habitat->habitat_name }} Details
            </h2>
        </x-slot>

        <div class="py-12"
        style="background-image: url('{{ asset('images/animal-background.jpg') }}'); background-size: cover; h60 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <x-habitat-detail :habitat_name="$habitat->habitat_name"
                                    :description="$habitat->description" :climate="$habitat->climate"
                                  :habitat_image="$habitat->image_url" 
                                  :created_at="$habitat->created_at"
                            :updated_at="$habitat->updated_at" />

                            @if(auth()->check() && auth()->user()->role === 'admin')   
                        <div class="mt-4">
                            <a href="{{ route('habitats.edit', $habitat->id) }}" class="text-blue-500 hover:underline">
                                Edit animal habitat
                            </a>
                                </div>



                           
                        <form action="{{ route('habitats.destroy', $habitat->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this habitat?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete animal habitat</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>