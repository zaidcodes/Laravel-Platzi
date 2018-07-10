<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home (){
        $links = [
            'https://github.com/zaidcodes'=>'Github',
            'https://twitter.com/zaidcodes'=>'Instagram',
            'https://instagram.com/zaidcodes'=>'Twitter',
            'https://platzi.com/@zaidcodes'=>'Platzi'
        ];
        return view('welcome',[
            'teacher' => 'Guido Contreras Woda',
            'links' => $links
        ]);
    }

    public function aboutUs(){
        return view('about');
    }
}
