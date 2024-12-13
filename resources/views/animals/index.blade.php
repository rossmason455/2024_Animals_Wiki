<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                {{ __('All Animal animals') }}
            </h2>
        </x-slot>

        <div style="background-image: url('{{ asset('images/animal-background.jpg') }}'); background-size: cover; h60 ">
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




                        <h3 class="font-semibold text-lg mb-4">List of animal animals:</h3>
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
    $(document).ready(function () {
        // Listen for input events on the search field with id "search"
        $('#search').on('input', function () {
            // Get the value typed in the search input field
            var query = $(this).val();

            // Only proceed if the query length is greater than 2 characters
            if (query.length > 2) {
                // Perform an AJAX GET request to the "animals.autocomplete" route
                $.ajax({
                    url: "{{ route('animals.autocomplete') }}", // URL of the autocomplete route
                    type: "GET", // HTTP method to be used
                    data: {
                        query: query // Send the search query as data to the server
                    },
                    // On successful response from the server
                    success: function (data) {
                        // Clear the previous suggestions and make the suggestions container visible
                        $('#suggestions').empty().removeClass('hidden');

                        // If there are results in the data returned by the server
                        if (data.length) {
                            // Loop through each animal in the response data
                            data.forEach(function (animal) {
                                // Append each animal name to the suggestions container as a clickable item
                                $('#suggestions').append(
                                    '<div class="suggestion-item cursor-pointer py-2 px-4 hover:bg-gray-200">' +
                                    animal.animal_name + '</div>'
                                );
                            });
                        } else {
                            // If no results found, show a "No suggestions found" message
                            $('#suggestions').append(
                                '<div class="py-2 px-4">No suggestions found</div>'
                            );
                        }
                    }
                });
            } else {
                // If the query length is less than 3, hide the suggestions container
                $('#suggestions').empty().addClass('hidden');
            }
        });

        // Handle click events on suggestion items
        $(document).on('click', '.suggestion-item', function () {
            // Set the value of the search input to the text of the clicked suggestion
            $('#search').val($(this).text());

            // Clear the suggestions and hide the suggestions container
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