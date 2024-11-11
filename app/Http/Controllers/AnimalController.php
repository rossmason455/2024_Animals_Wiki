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
        return view('animals.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Optional image
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image/animals'), $imageName);
    }

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
        'image_url' => $imageName ? 'image/animals/' . $imageName : null, // Store image path
    ]);

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
        'threats' => 'required|string|max:255', // Change to required
        'primary_predator' => 'required|string|max:255', // Change to required
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Optional image
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
    $query = $request->get('query');
    $animals = Animal::where('animal_name', 'LIKE', '%' . $query . '%')->get(['animal_name']); 
    return response()->json($animals);
}



}