<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasMessage()
    {
        return $this->hasOne(Message::class, 'session_id', 'session_id');
    }

    public function hasUser()
    {
        return $this->hasOne(User::class, 'id', 'sender_id');
    }

    public function hasManager()
    {
        return $this->hasOne(Admin::class, 'id', 'sender_id');
    }
}
