<?php

namespace App\Http\Controllers;

use App\Models\habitat;
use Illuminate\Http\Request;

class HabitatController extends Controller
{

    public function index()
    {
        $habitats = Habitat::all();  
        return view('habitats.index', compact('habitats'));
    }




    public function create()
    {
        if(auth()->user()->role !== 'admin'){
            return redirect()->route('habitats.index')->with('error', 'Access denied.');
        }
       
       
        return view('habitats.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'habitat_name' => 'required|string|max:255',   
            'description'  => 'nullable|string|max:1000',
            'climate'  => 'nullable|string|max:1000',
            'image_url',
        ]);
       
        //stores image provided into the images folder
    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image/animals'), $imageName);
    }

        habitat::create([
            'habitat_name' => $request->habitat_name,
            'description'  => $request->description,
            'climate'  => $request->climate,
           'image_url' => $imageName ? 'image/animals/' . $imageName : null, 
        ]);

  
        return redirect()->route('habitats.index')->with('success', 'habitat created successfully!');
    }


    public function show(habitat $habitat)
    {
        return view ('habitats.show')->with('habitat', $habitat);
    }



    public function edit(Habitat $habitat)
    {
         return view('habitats.edit', compact('habitat'));
    }



    public function update(Request $request, habitat $habitat)
{
    $request->validate([
        'habitat_name' => 'required|string|max:255',
        'description' => 'nullable|string|max:1000',
        'climate' => 'nullable|string|max:1000',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('image/animals'), $imageName);
    }

    $habitat->update([
      'habitat_name' => $request->habitat_name,
            'description' => $request->description,
            'climate' => $request->climate,
        'image_url' => $imageName ? 'image/animals/' . $imageName : $habitat->image_url, // Use existing if no new image
    ]);

    return redirect()->route('habitats.index')->with('success', 'habitat updated successfully!');
}

public function destroy(habitat $habitat)
{
     $habitat->delete(); // Deletes the animal from the database

return redirect()->route('habitats.index')->with('success', 'habitat deleted successfully!');
}



}
