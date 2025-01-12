<?php

namespace App\Modules\LostAndFound\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\LostAndFound\Models\LostAndFoundCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Libraries\DataFunction;

class LostAndFoundWebController
{

    public function index()
    {
        return view("LostAndFound::pages.web.index");
    }

    public function postCreate()
    {
        $data = [];
        $data['lostAndFoundTypes'] = ['Lost' => 'Lost', 'Found' => 'Found'];
        $data['lostAndFoundCategory'] = DataFunction::getLostAndFoundCategoryList();
        $data['countryList'] = DataFunction::getCountryList();
        $data['authUser'] = Auth::user();
        return view("LostAndFound::web.pages.post-create", $data);
    }
}
