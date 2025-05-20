<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'price',
        'image',
        'category',
        'brand',
        'description',
        'size',
        'available',
        'recommended_seasons' 
    ];

    protected $casts = [
        'recommended_seasons' => 'array', 
    ];
}
