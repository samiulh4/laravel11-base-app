<?php

namespace App\Modules\Facebook\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FacebookController
{

    
    public function index() : View
    {
        return view("Facebook::pages.web.index");
    }
}
