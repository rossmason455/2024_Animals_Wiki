<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    // Define the table name explicitly if it doesn't follow the Laravel naming convention
    protected $table = 'audits';

    // Specify fillable columns if needed
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