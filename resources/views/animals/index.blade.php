<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{ __('All Animals') }}
            </h2>
        </x-slot>

        <div
            style="background-image: url('{{ asset('images/animal-background.jpg') }}'); background-size: contain; h60 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-6 ">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">

                        <!-- Search Form -->
                        <form action="{{ route('animals.index') }}" method="GET" class="relative mb-4">
                            <input type="text" id="search" name="search" placeholder="Search animals..."
                                value="{{ request('search') }}" class="border-gray-300 rounded-md shadow-sm"
                                autocomplete="off" />
                            <button
                                class="inline-flex items-center px-4 py-2 bg-[#DAA520] border  font-semibold text-md text-white uppercase tracking-widest hover:bg-[#F4A300] focus:outline-none  focus:ring-offset-2 transition ease-in-out duration-150"
                                type="submit">Search</button>
                            <div id="suggestions" class="absolute z-10 bg-white border mt-1 w-full hidden"></div>
                        </form>

                        <h3 class="font-semibold text-lg mb-4">List of Animals:</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6 ">
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

        <x-alert-success>{{ session('success') }}</x-alert-success>
    </x-app-layout>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#search').on('input', function() {
        var query = $(this).val();
        if (query.length > 2) {
            $.ajax({
                url: "{{ route('animals.autocomplete') }}",
                type: "GET",
                data: {
                    query: query
                },
                success: function(data) {
                    $('#suggestions').empty().removeClass('hidden');
                    if (data.length) {
                        data.forEach(function(animal) {
                            // Only append the animal_name to suggestions
                            $('#suggestions').append(
                                '<div class="suggestion-item cursor-pointer py-2 px-4 hover:bg-gray-200">' +
                                animal.animal_name + '</div>');
                        });
                    } else {
                        $('#suggestions').append(
                            '<div class="py-2 px-4">No suggestions found</div>');
                    }
                }
            });
        } else {
            $('#suggestions').empty().addClass('hidden');
        }
    });

    // Handle click on suggestion
    $(document).on('click', '.suggestion-item', function() {
        $('#search').val($(this).text());
        $('#suggestions').empty().addClass('hidden');
    });
});
</script>


<style>
#suggestions {
    position: absolute;
    background-color: white;
    border: 1px solid #ccc;
    max-height: 200px;
    overflow-y: auto;
    z-index: 1000;
}
</style>