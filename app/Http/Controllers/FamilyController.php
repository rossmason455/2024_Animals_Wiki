<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{

    public function index()
    {
        $families = Family::all();  
        return view('families.index', compact('families'));
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



}
