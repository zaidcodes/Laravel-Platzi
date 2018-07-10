<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function show(Message $message){
        // $message = Message::find($id);

        return view('messages.show',[
            'message' => $message
        ]);
    }
    public function create(Request $request){
        //dd($request->all());

        $this->validate($request,[
            'message' => ['required','max:160'],
        ], [
            'message.required' => 'Por favor escribe un mensaje',
            'message.max' => 'El mensaje no puede superar los :max carácteres' 
        ]);
    }
}
