<div>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{_('All Transformers_movies')}}
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Details about the animal</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <x-animal-details
                            :id="$animal->id()"
                            :animal_name="$animal->string('animal_name')"
                            :scientific_name="$animal->string('scientific_name')"
                            :description="$animal->text('description')"
                            :behavioral_notes="$animal->text('behavioral_notes')"
                            :lifespan="$animal->string('lifespan')"
                            :diet="$animal->text('diet')"
                            :social_structure="$animal->text('social_structure')"
                            :threats="$animal->text('threats')"
                            :primary_predator="$animal->text('primary_predator')"
                            :year="$animal->integer('year')"
                            :image_url="$animal->string('image_url')"
                            :timestamps="$animal->timestamps()"
 
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
</div>
