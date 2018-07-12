<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Conversation;
use App\PrivateMessage;

class UsersController extends Controller
{
    public function show($username){
        $user = $this->findByUsername($username);
        $messages = $user ? $user->messages()->paginate(6) : null;
        return view('users.show',[
            'user' => $user,
            'messages' => $messages,
        ]);
    }

    public function follow($username, Request $request){
        $user = $this->findByUsername($username);
        $me = $request->user();
        
        $me->follows()->attach($user);
        return redirect("/$username")->withSuccess('Usuario seguido!');
    }
  
    public function unfollow($username, Request $request){
        $user = $this->findByUsername($username);
        $me = $request->user();

        $me->follows()->detach($user);
        return redirect("/$username")->withSuccess('Usuario no seguido!');
    }

    public function follows($username){
        $user = $this->findByUsername($username);
        return view('users.follows', [
            'user' => $user,
            'follows' => $user->follows,
        ]);
    }

    public function followers($username){
        $user = $this->findByUsername($username);
        return view('users.follows', [
            'user' => $user,
            'follows' => $user->followers,
        ]);
    }

    public function sendPrivateMessage($username, Request $request){
        $user = $this->findByUsername($username);

        $me = $request->user();
        $message = $request->input('message');
        //Hay ya una conversacion?
        $conversation = Conversation::between($me,$user);

        $privateMessage = PrivateMessage::create([
            'conversation_id' => $conversation->id,
            'user_id' => $me->id,
            'message' => $message,
        ]);

        return redirect('conversations/'. $conversation->id);
    }

    public function showConversation(Conversation $conversation){
        //cargar la relacion que tiene con usuarios y mensajes
        $conversation->load('users','privateMessages');
        // dd($conversation);
        return view('users.conversation',[
            'conversation' => $conversation,
            //usuario logueado
            'user' => auth()->user(),
        ]);
    }

    private function findByUsername($username){
        return User::where('username',$username)->firstOrFail();
    }
}
