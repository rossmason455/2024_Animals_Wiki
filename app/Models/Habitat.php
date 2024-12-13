<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitat extends Model
{

    // The Habitat model represents the 'animals' table in the database and defines the fillable attributes for mass assignment

    protected $fillable = [
        'habitat_name',
        'description',
        'climate',
        'image_url',
    ];

    // Define the many-to-many relationship with animals table
    public function animals()
    {
        return $this->belongsToMany(Animal::class);
    }
}