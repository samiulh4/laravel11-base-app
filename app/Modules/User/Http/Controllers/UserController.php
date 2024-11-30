<?php

namespace App\Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\User\Models\AppUser;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function editMyProfile()
    {
        $user = AppUser::find(Auth::user()->id);
        $genders = [
            'male' => 'Male',
            'female' => 'Female',
            'other' => 'Other'
        ];
        return view("User::pages.admin.edit-profile", compact('genders', 'user'));
    }

    public function saveMyProfile(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender_code' => 'required|string|in:male,female,other',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $user = AppUser::find(Auth::user()->id);
        $user->name = $validated['name'];
        $user->gender_code = $validated['gender_code'];

        if ($request->hasFile('avatar')) {
            $avatarName = time() . '_' . uniqid() . '.' . $request->file('avatar')->getClientOriginalExtension();
            $directory = public_path('uploads'.DIRECTORY_SEPARATOR.'avatar');
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);  // Create the directory with proper permissions
            }
            $avatarPath = $request->file('avatar')->move($directory, $avatarName);
           
            $user->avatar = 'uploads'.DIRECTORY_SEPARATOR.'avatar'.DIRECTORY_SEPARATOR.$avatarName;
        }


        $user->save();


        return redirect('/admin/user/edit-my-profile')->with('success', 'Profile updated successfully.');
    }
}
