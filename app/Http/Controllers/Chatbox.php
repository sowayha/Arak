<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Chatbox extends Controller
{

    public function message(){
        return view('vendor.Chatify.pages.app');
    }


}
