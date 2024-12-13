<?php

namespace App\Http\Controllers;

use App\Models\habitat;
use Illuminate\Http\Request;

class HabitatController extends Controller
{

    // Display a listing of the habitats.
    public function index()
    {
        // Retrieve all habitats from the database.
        $habitats = Habitat::all();

        // Return the habitats.index view with the retrieved habitats.
        return view('habitats.index', compact('habitats'));
    }

    // Show the form for creating a new habitat.
    public function create()
    {
        // Check if the authenticated user has the 'admin' role.
        // Redirect to the habitats.index route with an error message if not authorized.
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('habitats.index')->with('error', 'Access denied.');
        }

        // Return the habitats.create view for creating a new habitat.
        return view('habitats.create');
    }

    // Store a newly created habitat in the database.
    public function store(Request $request)
    {
        // Validate the incoming request data.
        $request->validate([
            'habitat_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'climate' => 'nullable|string|max:1000',
            'image_url',
        ]);

        // Initialize the image name as null.
        $imageName = null;

        // Check if an image file is provided in the request.
        // Save the image in the public image/animals directory with a unique name.
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image/animals'), $imageName);
        }

        // Create a new habitat record in the database with the provided data.
        habitat::create([
            'habitat_name' => $request->habitat_name,
            'description' => $request->description,
            'climate' => $request->climate,
            'image_url' => $imageName ? 'image/animals/' . $imageName : null,
        ]);

        // Redirect to the habitats.index route with a success message.
        return redirect()->route('habitats.index')->with('success', 'habitat created successfully!');
    }

    // Display the specified habitat.
    public function show(habitat $habitat)
    {
        // Return the habitats.show view with the specified habitat.
        return view('habitats.show')->with('habitat', $habitat);
    }

    // Show the form for editing the specified habitat.
    public function edit(Habitat $habitat)
    {
        // Return the habitats.edit view with the specified habitat.
        return view('habitats.edit', compact('habitat'));
    }

    // Update the specified habitat in the database.
    public function update(Request $request, habitat $habitat)
    {
        // Validate the incoming request data.
        $request->validate([
            'habitat_name' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'climate' => 'nullable|string|max:1000',
        ]);

        // Initialize the image name as null.
        $imageName = null;

        // Check if an image file is provided in the request.
        // Save the image in the public image/animals directory with a unique name.
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('image/animals'), $imageName);
        }

        // Update the habitat record in the database with the provided data.
        // If a new image is uploaded, use its URL; otherwise, retain the existing image URL.
        $habitat->update([
            'habitat_name' => $request->habitat_name,
            'description' => $request->description,
            'climate' => $request->climate,
            'image_url' => $imageName ? 'image/animals/' . $imageName : $habitat->image_url, // Use existing if no new image
        ]);

        // Redirect to the habitats.index route with a success message.
        return redirect()->route('habitats.index')->with('success', 'habitat updated successfully!');
    }

    // Remove the specified habitat from the database.
    public function destroy(habitat $habitat)
    {
        // Delete the habitat record from the database.
        $habitat->delete();

        // Redirect to the habitats.index route with a success message.
        return redirect()->route('habitats.index')->with('success', 'habitat deleted successfully!');
    }

}
