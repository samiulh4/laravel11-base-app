<?php

namespace App\Modules\Authentication\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationAdminController
{

    public function signUp()
    {
        return view("Authentication::admin.sign-up");
    }
}// End AuthenticationAdminController
