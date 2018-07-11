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
        return $this->hasMany(PrivateMessage::class)->orderBy('created_at', 'desc');
    }

    public static function between(User $user, User $other){
        $query =  Conversation::whereHas('users', function($query) use ($user){
            $query->where('user_id',$user->id);
        })->whereHas('users', function($query) use($other){
            $query->where('user_id', $other->id);
        });

        $conversation = $query->firstOrCreate([]);
        //Garatiza que los usuarios estan en la conversacion y si no estan, los agrega
        $conversation->users()->sync([
            $user->id, $other->id
        ]);
        return $conversation;
    }
}
