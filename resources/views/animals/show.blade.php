<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $animal->animal_name }} Details
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <x-animal-details :animal_name="$animal->animal_name"
                            :scientific_name="$animal->scientific_name" :description="$animal->description"
                            :behavioral_notes="$animal->behavioral_notes" :lifespan="$animal->lifespan"
                            :diet="$animal->diet" :social_structure="$animal->social_structure"
                            :threats="$animal->threats" :primary_predator="$animal->primary_predator"
                            :image="$animal->image_url" :created_at="$animal->created_at"
                            :updated_at="$animal->updated_at" />
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</div>