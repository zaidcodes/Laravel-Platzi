<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PrivateMessage extends Model{
    
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
