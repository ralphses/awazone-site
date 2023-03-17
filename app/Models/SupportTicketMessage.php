<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicketMessage extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'ticket_id', 'sender'];

    public function supportTicket() {
        return $this->belongsTo(SupportTicket::class, 'ticket_id');
    }
}
