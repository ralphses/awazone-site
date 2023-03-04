<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'authorities',
        'token',
        'description'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }
}
