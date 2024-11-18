<?php

namespace App\Modules\Document\Http\Controllers;

use Illuminate\Http\Request;

class DocumentController
{

    public function welcome()
    {
        return view("Document::welcome");
    }
}
