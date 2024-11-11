<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnimalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Group routes that require the 'auth' middleware, ensuring the user is authenticated
Route::middleware('auth')->group(function () {

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
    
    // GET route: Shows the profile edit form
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    
    // PATCH route: Updates the user's profile information
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    
    // DELETE route: Deletes the user's profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';