<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->get('search');

        $families = Family::when($search, function ($query) use ($search) {
            return $query->where('family_name', 'like', "%{$search}%");
        })->get();
    



        $families = Family::all();  
        return view('families.index', compact('families', 'search'));



    }




    public function create()
    {
        if(auth()->user()->role !== 'admin'){
            return redirect()->route('families.index')->with('error', 'Access denied.');
        }
       
       
        return view('families.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'family_name' => 'required|string|max:255',
            'characteristics' => 'nullable|string|max:1000',
            'evolutionary_origin' => 'nullable|string|max:1000',
        ]);
       
        //stores image provided into the images folder
    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image/animals'), $imageName);
    }

        Family::create([
            'family_name' => $request->family_name,
            'characteristics' => $request->characteristics,
            'evolutionary_origin' => $request->evolutionary_origin,
        ]);

  
        return redirect()->route('families.index')->with('success', 'Family created successfully!');
    }


    public function show(Family $family)
    {
        return view ('families.show')->with('family', $family);
    }


    public function edit(Family $family)
    {
         return view('families.edit', compact('family'));
    }


    public function update(Request $request, Family $family)
{
    $request->validate([
        'family_name' => 'required|string|max:255',
        'characteristics' => 'nullable|string|max:1000',
        'evolutionary_origin' => 'nullable|string|max:1000',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image/animals'), $imageName);
    }

    $family->update([
      'family_name' => $request->family_name,
            'characteristics' => $request->characteristics,
            'evolutionary_origin' => $request->evolutionary_origin,
        'image_url' => $imageName ? 'image/animals/' . $imageName : $family->image_url, // Use existing if no new image
    ]);

    return redirect()->route('families.index')->with('success', 'Family updated successfully!');
}

public function destroy(Family $family)
{
     $family->delete(); // Deletes the animal from the database

return redirect()->route('family.index')->with('success', 'Family deleted successfully!');
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
    $families = Family::where('family_name', 'LIKE', '%' . $query . '%')->get(['family_name']); 

    // 3. Return the matching animal names as a JSON response.
    // The front-end can then use this data to display the suggestions.
    return response()->json($families);
}




}
