<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('All Animals') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="font-semibold text-lg mb-4">List of Animals:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($animals as $animal)
                            <a href="{{ route('animals.show', $animal) }}">
                                <x-animal-card :animal_name="$animal->animal_name"
                                    :scientific_name="$animal->scientific_name" :description="$animal->description"
                                    :behavioral_notes="$animal->behavioral_notes" :lifespan="$animal->lifespan"
                                    :diet="$animal->diet" :social_structure="$animal->social_structure"
                                    :threats="$animal->threats" :primary_predator="$animal->primary_predator"
                                    :image="$animal->image_url" />
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <x-alert-success>{{session('success')}}</x-alert-success>
    </x-app-layout>
</div>