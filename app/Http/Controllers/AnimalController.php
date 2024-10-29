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
    public function index()
    {
        $animals = Animal::all();
        return view('animals.index', compact('animals'));
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
        $request->validate(['animal_name' => 'required|string|max:255',
        'scientific_name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'behavioral_notes' => 'nullable|string',
        'lifespan' => 'nullable|string|max:100',
        'diet' => 'nullable|string|max:255',
        'social_structure' => 'nullable|string|max:255',
        'threats' => 'nullable|string|max:255',
        'primary_predator' => 'nullable|string|max:255',
        'image_url' => 'nullable|url|max:255',]);





        if ($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
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
        'image_url' => $request->image_url,
        'created_at' => $request->created_at,
        'updated_at' => $request->updated_at,]);
    
    
    
    
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Animal $animal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Animal $animal)
    {
        //
    }
}