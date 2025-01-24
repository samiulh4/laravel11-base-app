<?php

namespace App\Modules\Facebook\Http\Controllers;

use Illuminate\Http\Request;

class FacebookWebController
{

    
    public function index()
    {
        return view("Facebook::web.pages.index");
    }
}
