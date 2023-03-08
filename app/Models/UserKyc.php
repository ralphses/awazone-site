<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserKyc extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'path', 'verified_on', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
