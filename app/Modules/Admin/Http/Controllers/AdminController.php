<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

class AdminController
{
    public function index()
    {
        return view('Admin::pages.index');
    }
}
