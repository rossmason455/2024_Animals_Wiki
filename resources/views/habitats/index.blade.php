<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{ __('All Animal Habitats') }}
            </h2>
        </x-slot>

        <div
        style="background-image: url('{{ asset('images/animal-background.jpg') }}'); background-size: cover; h60 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                       
                        <h3 class="font-semibold text-lg mb-4">List of Animal Habitats:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 ">
                            @foreach($habitats as $habitat)
                            <a href="{{ route('habitats.show', $habitat) }}">
                                <x-habitat-card :habitat_name="$habitat->habitat_name"
                                    :description="$habitat->characterisitcs" :climate="$habitat->climate"
                                    :image="$habitat->image_url" />
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-alert-success>{{ session('success') }}</x-alert-success>
    </x-app-layout>
</div>


