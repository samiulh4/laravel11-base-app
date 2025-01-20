<?php

namespace App\Modules\LostAndFound\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Libraries\DataFunction;
use App\Libraries\EncryptionFunction;
use App\Modules\LostAndFound\Models\LostAndFoundCategory;
use App\Modules\LostAndFound\Models\LostAndFoundPost;

class LostAndFoundWebController
{

    public function index()
    {
        $data = [];
        $data['posts'] = LostAndFoundPost::where('is_active', 1)
            ->orderBy('updated_at', 'desc')
            ->get();
        $data['categories'] = DataFunction::getLostAndFoundCategoryList();
        return view("LostAndFound::web.pages.index",  $data);
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
    public function postStore(Request $request)
    {

        // Validate the incoming request
        $validated = $request->validate([
            'lost_and_found_type' => 'required|string',
            'lost_and_found_category_id' => 'required',
            'lost_and_found_country_id' => 'required',
            'lost_and_found_contact_email' => 'required|email',
            'lost_and_found_contact_mobile' => 'required|string',
            'lost_and_found_contact_telephone' => 'nullable|string',
            'lost_and_found_contact_address' => 'required|string',
            'lost_and_found_title' => 'required|string',
            'lost_and_found_description' => 'required|string',
            'lost_and_found_location' => 'required|string',
            'lost_and_found_date' => 'required|date',
            'lost_and_found_time' => 'required|date_format:H:i:s',
            'lost_and_found_cover' => 'required|image|mimes:jpeg,png,jpg|max:3072', // Image validation (3 MB)
        ]);



        if ($request->hasFile('lost_and_found_cover')) {
            $fileName = time() . '_' . uniqid() . '.' . $request->file('lost_and_found_cover')->getClientOriginalExtension();
            $directory = public_path('uploads' . DIRECTORY_SEPARATOR . 'lost_and_found_posts');
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);  // Create the directory with proper permissions
            }
            $is_uploaded = $request->file('lost_and_found_cover')->move($directory, $fileName);
            if ($is_uploaded) {
                $lost_and_found_cover = 'uploads' . DIRECTORY_SEPARATOR . 'lost_and_found_posts' . DIRECTORY_SEPARATOR . $fileName;
            }
        }

        $lost_and_found_category_id = EncryptionFunction::decodeId($validated['lost_and_found_category_id']);
        $lost_and_found_country_id = EncryptionFunction::decodeId($validated['lost_and_found_country_id']);

        // Create a new LostAndFound record
        $lostAndFound = LostAndFoundPost::create([
            'lost_and_found_type' => $validated['lost_and_found_type'],
            'lost_and_found_category_id' => $lost_and_found_category_id,
            'lost_and_found_country_id' => $lost_and_found_country_id,
            'lost_and_found_contact_email' => $validated['lost_and_found_contact_email'],
            'lost_and_found_contact_mobile' => $validated['lost_and_found_contact_mobile'],
            'lost_and_found_contact_telephone' => $validated['lost_and_found_contact_telephone'],
            'lost_and_found_contact_address' => $validated['lost_and_found_contact_address'],
            'lost_and_found_title' => $validated['lost_and_found_title'],
            'lost_and_found_description' => $validated['lost_and_found_description'],
            'lost_and_found_location' => $validated['lost_and_found_location'],
            'lost_and_found_date' => $validated['lost_and_found_date'],
            'lost_and_found_time' => $validated['lost_and_found_time'],
            'lost_and_found_cover' => !empty($lost_and_found_cover) ? $lost_and_found_cover : '',
            'is_active' => 1,
            'created_by' => Auth::user()->id,
            'updated_by' => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Lost/Found post created successfully.');
    }

    public function postDetail($slug, $encodeId)
    {
        $data = [];
        $data['slug'] = $slug;
        $data['encodeId'] = $encodeId;
        $decodeId = EncryptionFunction::decodeId($encodeId);
        $data['post'] = LostAndFoundPost::leftJoin('users', 'lost_and_found_posts.created_by', '=', 'users.id')
            ->leftJoin('areas', 'lost_and_found_posts.lost_and_found_country_id', '=', 'areas.id')
            ->where('lost_and_found_posts.id', $decodeId)
            ->select(
                'lost_and_found_posts.*',
                'users.name as user_name',
                'users.email as user_email',
                'users.avatar as user_avatar',
                'areas.area_name as country_name'
            )
            ->first();
        return view("LostAndFound::web.pages.post-detail",  $data);
    }
}
