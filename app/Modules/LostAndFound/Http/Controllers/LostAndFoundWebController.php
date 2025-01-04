<?php

namespace App\Modules\LostAndFound\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\LostAndFound\Models\LostAndFoundCategory;
use Illuminate\Support\Facades\DB;

class LostAndFoundWebController
{

    public function index()
    {
        return view("LostAndFound::pages.web.index");
    }

    public function postCreate()
    {
        $lostAndFoundTypes = ['Lost' => 'Lost', 'Found' => 'Found'];
        $lostAndFoundCategory = LostAndFoundCategory::where('is_active', 1)->pluck('name', 'id');
        return view("LostAndFound::web.pages.post-create", compact('lostAndFoundTypes', 'lostAndFoundCategory'));
    }
}
