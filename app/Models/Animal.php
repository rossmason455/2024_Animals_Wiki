<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

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
    ];
}