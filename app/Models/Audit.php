<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{

    protected $table = 'audits';


      // The Audit model represents the 'animals' table in the database and defines the fillable attributes for mass assignment.

    protected $fillable = [
    'user_id', 
    'event', 
    'auditable_type', 
    'auditable_id', 
    'old_values', 
    'new_values', 
    'url', 
    'ip_address', 
    'user_agent', 
    'tags'];
}