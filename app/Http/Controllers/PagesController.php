<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller{
    
    public function home (){
        $messages = [
            [
                'id'=> 1,
                'content'=> 'Primer mensaje',
                'image'=> 'http://lorempixel.com/600/338?1'
            ],
            [
                'id'=> 2,
                'content'=> 'Segundo mensaje',
                'image'=> 'http://lorempixel.com/600/338?2'
            ],
            [
                'id'=> 3,
                'content'=> 'Tercer mensaje',
                'image'=> 'http://lorempixel.com/600/338?3'
            ],
            [
                'id'=> 4,
                'content'=> 'Cuarto mensaje',
                'image'=> 'http://lorempixel.com/600/338?4'
            ]
        ];
        return view('welcome',[
            'messages' => $messages
        ]);
    }

}
