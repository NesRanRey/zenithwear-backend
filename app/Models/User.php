<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public $timestamps = false;

    
    protected $fillable = [
        'name', 
        'lastName', 
        'address', 
        'phoneNumber', 
        'dateOfBirth', 
        'gender', 
        'password', 
        'user'
    ];
}
