<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    // The Animal model represents the 'animals' table in the database and defines the fillable attributes for mass assignment.

    protected $fillable =[
         'animal_name',
    'scientific_name',
    'description',
    'behavioral_notes',
    'lifespan',
    'diet',
    'social_structure',
    'threats',
    'primary_predator',
    'image_url',
    'created_at',
    'updated_at',
    'family_id',
        'habitat_id',
    ];

    public function family()
    {
        return $this->belongsTo(Family::class);
    }

    public function habitat()
    {
        return $this->belongsTo(Habitat::class);
    }




}