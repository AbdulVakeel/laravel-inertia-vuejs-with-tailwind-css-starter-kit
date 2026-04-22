<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportMessage extends Model
{
    // Allow mass assignment
    protected $fillable = [
        'support_ticket_id',
        'message',
        'admin_id',    // optional if admin can reply
    ];

    // Relationships
    public function ticket()
    {
        return $this->belongsTo(SupportTicket::class, 'support_ticket_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function attachments()
    {
        return $this->hasMany(SupportAttachment::class, 'support_message_id', 'id');
    }
}
