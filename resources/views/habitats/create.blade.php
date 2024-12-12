<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Animal Habitat') }}
        </h2>
    </x-slot>

    <div class="py-12 "
    style="background-image: url('{{ asset('images/animal-background.jpg') }}'); background-size: cover; h60 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Add a new animal habitat</h3>
                    <x-habitat-form :action="route('habitats.store')" :method="'POST'" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>