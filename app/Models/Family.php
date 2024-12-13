<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{


    // The Family model represents the 'animals' table in the database and defines the fillable attributes for mass assignment.

    protected $fillable = [
        'family_name',
        'characteristics',
        'evolutionary_origin',
        'image_url',
    ];


    // Define the one-to-many relationship with animals table

    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}


