<?php

namespace App\Modules\Facebook\Http\Controllers;

use Illuminate\Http\Request;

class FacebookController
{

    
    public function index()
    {
        // return view("layouts.facebook");
        return view("Facebook::layouts.master");
    }
}
