<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'message', 'relation_to_admin', 'attachment', 'admin_reply', 'reply_attachment', 'is_replied'];

    public function guest()
    {
        return $this->belongsTo(Guest::class);
    }
}