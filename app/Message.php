<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function receiver_chat()
    {
        return $this->belongsTo(User::class, 'receiver');
    }

    public function sender_chat()
    {
        return $this->belongsTo(User::class, 'sender');
    }
}
