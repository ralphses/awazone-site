<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone',
        'address',
        'zip_or_postal_code',
        'state',
        'province',
        'user_id',
        'country',
        'user_id'
    ];

    
 
}
