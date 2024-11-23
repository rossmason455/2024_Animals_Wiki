<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habitat extends Model
{
    protected $fillable = [
        'habitat_name',
        'description',
        'climate',
    ];

    // Define the many-to-many relationship with animals
    public function animals()
    {
        return $this->belongsToMany(Animal::class);
    }
}