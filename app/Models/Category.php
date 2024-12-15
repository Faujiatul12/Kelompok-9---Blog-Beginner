<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Define the table associated with the Category model (optional if it's default)
    protected $table = 'categories';

    // Define the fillable properties for mass assignment
    protected $fillable = [
        'name',       
        'slug',       
        'description',
        'image'
    ];

    public function galleries()
    {
        return $this->hasMany(Gallery::class);  
    }
}
