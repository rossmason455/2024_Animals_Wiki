<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;  

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  public function index(Request $request)
{
    // Get the search query from the request
    $search = $request->get('search');

    // Retrieve animals with optional search filtering
    $animals = Animal::when($search, function ($query) use ($search) {
        return $query->where('animal_name', 'like', "%{$search}%")
                     ->orWhere('scientific_name', 'like', "%{$search}%");
    })->get();

    return view('animals.index', compact('animals', 'search'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        if(auth()->user()->role !== 'admin'){
            return redirect()->route('animals.index')->with('error', 'Access denied.');
        }




        return view('animals.create');



    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{ 
    //ensures the request has the required fields
    $request->validate([
        'animal_name' => 'required|string|max:255',
        'scientific_name' => 'required|string|max:255',
        'description' => 'required|string', // Change to required
        'behavioral_notes' => 'required|string', // Change to required
        'lifespan' => 'required|string|max:100', // Change to required
        'diet' => 'required|string|max:255', // Change to required
        'social_structure' => 'required|string|max:255', // Change to required
        'threats' => 'required|string|max:255', // Change to required
        'primary_predator' => 'required|string|max:255', // Change to required
        'family_id' => 'required|exists:families,id',
        'habitat_id' => 'required|exists:habitats,id',
        'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Optional image
  
    ]);
//stores image provided into the images folder
    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image/animals'), $imageName);
    }
//inserts the new record into the animals table
    Animal::create([
        'animal_name' => $request->animal_name,
        'scientific_name' => $request->scientific_name,
        'description' => $request->description,
        'behavioral_notes' => $request->behavioral_notes,
        'lifespan' => $request->lifespan,
        'diet' => $request->diet,
        'social_structure' => $request->social_structure,
        'threats' => $request->threats,
        'primary_predator' => $request->primary_predator,
        'family_id' => $request->family_id,
        'habitat_id' => $request->habitat_id,
        'image_url' => $imageName ? 'image/animals/' . $imageName : null, // Store image path
    ]);
//redirects to the index with a success message
    return redirect()->route('animals.index')->with('success', 'Animal created successfully!');
}




    /**
     * Display the specified resource.
     */
    public function show(Animal $animal)
    {
       
       
        return view ('animals.show')->with('animal', $animal);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Animal $animal)
    {
         return view('animals.edit', compact('animal'));
    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Animal $animal)
{
    $request->validate([
        'animal_name' => 'required|string|max:255',
        'scientific_name' => 'required|string|max:255',
        'description' => 'required|string', // Change to required
        'behavioral_notes' => 'required|string', // Change to required
        'lifespan' => 'required|string|max:100', // Change to required
        'diet' => 'required|string|max:255', // Change to required
        'social_structure' => 'required|string|max:255', // Change to required
        'threats' => 'required|string|max:255', 
        'primary_predator' => 'required|string|max:255',
        'family_id' => 'required|exists:families,id',
        'habitat_id' => 'required|exists:habitats,id', 
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', 

    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image/animals'), $imageName);
    }

    $animal->update([
        'animal_name' => $request->animal_name,
        'scientific_name' => $request->scientific_name,
        'description' => $request->description,
        'behavioral_notes' => $request->behavioral_notes,
        'lifespan' => $request->lifespan,
        'diet' => $request->diet,
        'social_structure' => $request->social_structure,
        'threats' => $request->threats,
        'primary_predator' => $request->primary_predator,
        'family_id' => $request->family_id,
        'habitat_id' => $request->habitat_id,
        'image_url' => $imageName ? 'image/animals/' . $imageName : $animal->image_url, // Use existing if no new image
    ]);

    return redirect()->route('animals.index')->with('success', 'Animal updated successfully!');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
         $animal->delete(); // Deletes the animal from the database

    return redirect()->route('animals.index')->with('success', 'Animal deleted successfully!');
    }



public function autocomplete(Request $request)
{
    // 1. Retrieve the 'query' parameter from the incoming request.
    // This is the search term entered by the user.
    $query = $request->get('query');

    // 2. Query the 'animals' table to find animals whose 'animal_name' 
    // contains the search query (case-insensitive).
    // 'LIKE' allows partial matching, and '%' is used to match any characters before and after the query.
    // Only the 'animal_name' column is retrieved to keep the response lightweight.
    $animals = Animal::where('animal_name', 'LIKE', '%' . $query . '%')->get(['animal_name']); 

    // 3. Return the matching animal names as a JSON response.
    // The front-end can then use this data to display the suggestions.
    return response()->json($animals);
}



}