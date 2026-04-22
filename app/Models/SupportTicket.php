<?php

namespace App\Models;

use App\Constants\Status;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryFilter;

class SupportTicket extends Model
{
      use QueryFilter;
    protected $fillable = [
        'user_id',
        'ticket',
        'name',
        'email',
        'subject',
        'priority',
        'status',
        'last_reply',
    ];

    // Accessors
    public function fullname(): Attribute
    {
        return new Attribute(
            get: fn () => $this->name,
        );
    }

    public function username(): Attribute
    {
        return new Attribute(
            get: fn () => $this->email,
        );
    }

    public function statusBadge(): Attribute
    {
        return new Attribute(function () {
            $html = '';
            if ($this->status == Status::TICKET_OPEN) {
                $html = '<span class="badge badge--success">' . trans("Open") . '</span>';
            } elseif ($this->status == Status::TICKET_ANSWER) {
                $html = '<span class="badge badge--primary">' . trans("Answered") . '</span>';
            } elseif ($this->status == Status::TICKET_REPLY) {
                $html = '<span class="badge badge--warning">' . trans("Customer Reply") . '</span>';
            } elseif ($this->status == Status::TICKET_CLOSE) {
                $html = '<span class="badge badge--dark">' . trans("Closed") . '</span>';
            }
            return $html;
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supportMessage()
    {
        return $this->hasMany(SupportMessage::class);
    }

   // Scope for open tickets
public function scopeStatusOpen($query)
{
    return $query->whereIn('status', [Status::TICKET_OPEN, Status::TICKET_REPLY]);
}

// Scope for closed tickets
public function scopeStatusClosed($query)
{
    return $query->where('status', Status::TICKET_CLOSE);
}

// Scope for answered tickets
public function scopeStatusAnswered($query)
{
    return $query->where('status', Status::TICKET_ANSWER);
}

// Scope for replied tickets (you were missing this)
public function scopeStatusReplied($query)
{
    return $query->where('status', Status::TICKET_REPLY);
}

}
