<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{

    protected $fillable = [
        'family_name',
        'characteristics',
        'evolutionary_origin',
    ];



    public function animals()
    {
        return $this->hasMany(Animal::class);
    }
}


