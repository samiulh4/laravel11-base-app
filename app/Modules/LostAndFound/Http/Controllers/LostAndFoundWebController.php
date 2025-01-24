<?php

namespace App\Modules\LostAndFound\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Libraries\DataFunction;
use App\Libraries\EncryptionFunction;
use App\Modules\LostAndFound\Models\LostAndFoundPost;
use Exception;

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

        
        // Create a new LostAndFound record
        $lostAndFound = LostAndFoundPost::create([
            'lost_and_found_type' => $validated['lost_and_found_type'],
            'lost_and_found_category_id' => $validated['lost_and_found_category_id'],
            'lost_and_found_country_id' => $validated['lost_and_found_country_id'],
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

    public function postEdit($encodeId)
    {
        $decodeId = EncryptionFunction::decodeId($encodeId);
        $data = [];
        $data['encodeId'] = $encodeId;
        $data['lostAndFoundTypes'] = ['Lost' => 'Lost', 'Found' => 'Found'];
        try {
            $data['post'] = $post = LostAndFoundPost::find($decodeId);
            $data['lostAndFoundCategory'] = DataFunction::getLostAndFoundCategoryList();
            $data['countryList'] = DataFunction::getCountryList();
            $data['authUser'] = Auth::user();
            return view("LostAndFound::web.pages.post-edit", $data);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function postUpdate(Request $request, $encodeId)
    {
        $post_id = EncryptionFunction::decodeId($encodeId);

        // Validate the incoming data
        $validated = $request->validate([
            'lost_and_found_type' => 'required|string|max:255',
            'lost_and_found_category_id' => 'required|integer|exists:lost_and_found_categories,id',
            'lost_and_found_country_id' => 'required|integer|exists:areas,id',
            'lost_and_found_contact_email' => 'required|email|max:255',
            'lost_and_found_contact_mobile' => 'required|string|max:15',
            'lost_and_found_contact_telephone' => 'nullable|string|max:15',
            'lost_and_found_contact_address' => 'nullable|string|max:255',
            'lost_and_found_title' => 'required|string|max:255',
            'lost_and_found_description' => 'required|string',
            'lost_and_found_location' => 'required|string|max:255',
            'lost_and_found_date' => 'required|date',
            'lost_and_found_time' => 'required|date_format:H:i:s',
            'lost_and_found_cover' => 'nullable|image|mimes:jpeg,jpg,png|max:3072', // 3 MB limit
        ]);

        // Find the post by ID
        $post = LostAndFoundPost::findOrFail($post_id);

        // Update the post with validated data
        $post->fill($validated);

        // Handle file upload
        if ($request->hasFile('lost_and_found_cover')) {
            $fileName = time() . '_' . uniqid() . '.' . $request->file('lost_and_found_cover')->getClientOriginalExtension();
            $directory = public_path('uploads' . DIRECTORY_SEPARATOR . 'lost_and_found_posts');
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);  // Create the directory with proper permissions
            }
            $is_uploaded = $request->file('lost_and_found_cover')->move($directory, $fileName);
            if ($is_uploaded) {
                $post->lost_and_found_cover = 'uploads' . DIRECTORY_SEPARATOR . 'lost_and_found_posts' . DIRECTORY_SEPARATOR . $fileName;
            }
        }

        // Save the updated post
        $post->save();
        return redirect()->back()->with('success', $post->lost_and_found_title.' updated successfully!');
    }
}
