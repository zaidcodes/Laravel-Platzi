<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
            'user' => $user
        ]);
    }

    private function findByUsername($username){
        return User::where('username',$username)->first();
    }
}
