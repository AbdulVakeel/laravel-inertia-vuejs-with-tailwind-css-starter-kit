<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class SupportAttachment extends Model
{
    // Allow mass assignment
    protected $fillable = [
        'support_message_id',
        'file_name',   // or whatever field you use for attachment
        'file_path',
    ];

    protected $appends = ['encrypted_id'];

    // Relationship
    public function supportMessage()
    {
        return $this->belongsTo(SupportMessage::class, 'support_message_id');
    }

    // Encrypted ID accessor
    public function encryptedId(): Attribute
    {
        return new Attribute(
            get: fn () => encrypt($this->attributes['id']),
        );
    }
}
