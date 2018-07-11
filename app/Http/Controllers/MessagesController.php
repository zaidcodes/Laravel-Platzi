<?php

namespace App\Http\Controllers;

use App\Message;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{
    public function show(Message $message){
        // $message = Message::find($id);

        return view('messages.show',[
            'message' => $message
        ]);
    }
    public function create(CreateMessageRequest $request){
        $user = $request->user();
        
        $message = Message::create([
            'user_id' => $user->id,
            'content' => $request->input('message'),
            'image' => 'http://lorempixel.com/600/338?' . mt_rand(0,100)
        ]);
        return redirect('/messages/'.$message->id);
    }
}
