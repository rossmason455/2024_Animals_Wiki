<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $family->family_name }} Details
            </h2>
        </x-slot>

        <div class="py-12"
            style="background-image: url('{{ asset('images/family-background.jpg') }}'); background-size: contain; h60 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <x-family-detail :family_name="$family->family_name"
                                    :characteristics="$family->characteristics" :evolutionary_origin="$family->evolutionary_origin"
                                  :image="$family->image_url" 
                                  
                    :created_at="$family->created_at"
                            :updated_at="$family->updated_at" />
                          
                            @if(auth()->check() && auth()->user()->role === 'admin')
                        <div class="mt-4">
                            <a href="{{ route('families.edit', $family->id) }}" class="text-blue-500 hover:underline">
                                Edit animal family
                            </a>
                            </div>
                    
                       
                     
                        <form action="{{ route('families.destroy', $family->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this family?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete animal family</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>