<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    // Add all relevant fields to the fillable property
    protected $fillable = [
        'name',
        'description',
        'price',
        'seller',
        'category',
        'location',
        'rating',
        'image',
    ];
}
