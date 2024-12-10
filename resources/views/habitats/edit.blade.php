<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Animal Habitat') }}
        </h2>
    </x-slot>

    <div class="py-12"
    style="background-image: url('{{ asset('images/animal-background.jpg') }}'); background-size: cover; h60 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Edit Animal Habitat</h3>
                    <x-animal-form :action="route('families.update', $animal->id)" :method="'PUT'" :habitat="$habitat"
                        buttonText="Update Animal Habitat" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>