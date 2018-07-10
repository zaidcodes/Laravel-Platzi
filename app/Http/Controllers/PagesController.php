<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class PagesController extends Controller{
    
    public function home (){
        $messages = Message::paginate(10);
        // dd($messages); /* var_dump() de Laravel */
        return view('welcome',[
            'messages' => $messages
        ]);
    }

}
