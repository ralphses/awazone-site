<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
    use HasFactory;

    protected $fillable = ['ticket_id', 'subject', 'status', 'message', 'name', 'email', 'phone', "attachment"];

    public function supportTicketMessages() {
        return $this->hasMany(SupportTicketMessage::class, 'ticket_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
