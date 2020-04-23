<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function repeater()
    {
        return $this->belongsTo(User::class, 'repeater_id');
    }
}
