<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\HabitatController;
use App\Http\Controllers\AuditController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group routes that require the 'auth' middleware, ensuring the user is authenticated
Route::middleware('auth')->group(function () {



    //Animal routes

    // GET route: Displays the list of animals
    Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index'); 
    
    // GET route: Displays search results based on user input
    Route::get('/animals/search', [AnimalController::class, 'search'])->name('animals.search');
    
    // GET route: Handles autocomplete requests based on search input
    Route::get('/animals/autocomplete', [AnimalController::class, 'autocomplete'])->name('animals.autocomplete');
    
    // GET route: Shows the form to create a new animal
    Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
    
    // POST route: Handles storing a new animal in the database
    Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store');  
    
    // GET route: Shows the form to edit an existing animal
    Route::get('/animals/{animal}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
    
    // PUT route: Updates an existing animal's details in the database
    Route::put('/animals/{animal}', [AnimalController::class, 'update'])->name('animals.update');
    
    // DELETE route: Deletes an animal from the database
    Route::delete('/animals/{animal}', [AnimalController::class, 'destroy'])->name('animals.destroy');
    
    // GET route: Displays details of a single animal
    Route::get('/animals/{animal}', [AnimalController::class, 'show'])->name('animals.show');



    //Family Routes (no pun intended)

    // GET route: Displays the list of animal families
    Route::get('families', [FamilyController::class, 'index'])->name('families.index');
    
        // GET route: Shows the form to create a new animal family
    Route::get('families/create', [FamilyController::class, 'create'])->name('families.create');

    // POST route: Handles storing a new animal family in the database
    Route::post('families', [FamilyController::class, 'store'])->name('families.store');
    
    // GET route: Shows the form to edit an existing animal family
    Route::get('families/{family}/edit', [FamilyController::class, 'edit'])->name('families.edit');
    
    // PUT route: Updates an existing animal family's details in the database
    Route::put('families/{family}', [FamilyController::class, 'update'])->name('families.update');
    
    // DELETE route: Deletes an family from the database
    Route::delete('families/{family}', [FamilyController::class, 'destroy'])->name('families.destroy');
    
    // GET route: Displays details of a single family
    Route::get('families/{family}', [FamilyController::class, 'show'])->name('families.show');

     // PUT route: Updates an existing animal family's details in the database
    Route::get('/families/search', [FamilyController::class, 'search'])->name('families.search');
    
    Route::get('/families/autocomplete', [FamilyController::class, 'autocomplete'])->name('families.autocomplete');
    
    
    // GET route: Displays the list of habitats
    Route::get('habitats', [HabitatController::class, 'index'])->name('habitats.index');
    
    // GET route: Shows the form to create a new habitat
    Route::get('habitats/create', [HabitatController::class, 'create'])->name('habitats.create');
    
    // POST route: Handles storing a new habitat in the database
    Route::post('habitats', [HabitatController::class, 'store'])->name('habitats.store');
    
    // GET route: Shows the form to edit an existing habitat
    Route::get('habitats/{habitat}/edit', [HabitatController::class, 'edit'])->name('habitats.edit');
    
     // PUT route: Updates an existing habitat's details in the database
    Route::put('habitats/{habitat}', [HabitatController::class, 'update'])->name('habitats.update');
    
    // DELETE route: Deletes an habitat from the database
    Route::delete('habitats/{habitat}', [HabitatController::class, 'destroy'])->name('habitats.destroy');
    
    // GET route: Displays details of a single habitat
    Route::get('habitats/{habitat}', [HabitatController::class, 'show'])->name('habitats.show');

    // GET route: Displays the list of audits
    Route::get('audits', [AuditController::class, 'index'])->name('audits.index');

    
    // GET route: Shows the profile edit form
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // PATCH route: Updates the user's profile information
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // DELETE route: Deletes the user's profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';