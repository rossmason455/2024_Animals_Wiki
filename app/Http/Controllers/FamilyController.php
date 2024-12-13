<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->get('search');

        // Retrieve families with optional search filtering
        $families = Family::when($search, function ($query) use ($search) {
            return $query->where('family_name', 'like', "%{$search}%");
        })->get();

        // Redirect to the index view with families and search query
        return view('families.index', compact('families', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ensure only admins can access the create form
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('families.index')->with('error', 'Access denied.');
        }

        return view('families.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request input fields
        $request->validate([
            'family_name' => 'required|string|max:255',
            'characteristics' => 'nullable|string|max:1000',
            'evolutionary_origin' => 'nullable|string|max:1000',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Optionally handle an image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image/animals'), $imageName);
        }

        // Insert the new record into the families table
        Family::create([
            'family_name' => $request->family_name,
            'characteristics' => $request->characteristics,
            'evolutionary_origin' => $request->evolutionary_origin,
            'image_url' => $imageName ? 'image/animals/' . $imageName : null, 
        ]);

        // Redirect to the index with a success message
        return redirect()->route('families.index')->with('success', 'Family created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Family $family)
    {
        // Return the family details view
        return view('families.show')->with('family', $family);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        // Return the edit form for the family
        return view('families.edit', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        // Validate the request input fields
        $request->validate([
            'family_name' => 'required|string|max:255',
            'characteristics' => 'nullable|string|max:1000',
            'evolutionary_origin' => 'nullable|string|max:1000',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Optionally handle an image upload
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image/animals'), $imageName);
        }

        // Update the family record with the provided data
        $family->update([
            'family_name' => $request->family_name,
            'characteristics' => $request->characteristics,
            'evolutionary_origin' => $request->evolutionary_origin,
            'image_url' => $imageName ? 'image/animals/' . $imageName : $family->image_url, // Use existing if no new image
        ]);

        // Redirect to the index with a success message
        return redirect()->route('families.index')->with('success', 'Family updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        // Delete the family record from the database
        $family->delete();

        // Redirect to the index with a success message
        return redirect()->route('families.index')->with('success', 'Family deleted successfully!');
    }

    /**
     * Handle autocomplete functionality for families.
     */
    public function autocomplete(Request $request)
    {
        // Retrieve the 'query' parameter from the request
        $query = $request->get('query');

        // Query the families table to find matching family names
        $families = Family::where('family_name', 'LIKE', '%' . $query . '%')->get(['family_name']);

        // Return the matching family names as a JSON response
        return response()->json($families);
    }
}
