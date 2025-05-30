<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingStatus extends Model
{
    use HasFactory;

    protected $fillable = ['status_name']; 

    public $timestamps = false; 
} 
