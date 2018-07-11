<?php

namespace App;

use App\User;
use App\PrivateMessage;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function privateMessages(){
        return $this->hasMany(PrivateMessage::class);
    }
}
