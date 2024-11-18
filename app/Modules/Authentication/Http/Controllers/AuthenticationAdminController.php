<?php

namespace App\Modules\Authentication\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Modules\User\Models\AppUser;
use App\Models\User;
use Exception;

class AuthenticationAdminController
{

    public function adminSignUp()
    {
        return view("Authentication::admin.sign-up");
    } // End adminSignUp()

    public function signUpStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:320|unique:users',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'Name field is required.',
            'password.required' => 'Password field is required.',
            'email.required' => 'Email field is required.',
            'email.email' => 'Email field must be email address.'
        ]);

        DB::beginTransaction();

        try {
            AppUser::create([
                'name' => $request->name,
                'email' => $request->email,
                'user_name' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            DB::commit();

            session()->flash('success', 'Account created successfully. Please log in. [AUTH-1001]');
            return redirect('/admin/sign-in');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->withErrors(['error' => 'There was an error creating your account. [AUTH-1002]']);
        }
    } // End signUpStore()

    public function adminSignIn()
    {
        return view("Authentication::admin.sign-in");
    } // End adminSignIn()

    public function signInAction(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ], [
            'email.required' => 'Email is required.',
            'email.email' => 'Email must be a valid email address.',
            'password.required' => 'Password is required.',
        ]);

        try {
            $user = User::where('email', $request->email)->where('is_active', 1)->first();

            if (!$user) {
                return redirect()->back()->withErrors(['error' => 'Account not found or inactive.']);
            }
            if (!Hash::check($request->password, $user->password)) {
                return redirect()->back()->withErrors(['error' => 'Invalid credentials.']);
            }

            Auth::login($user);

            return redirect()->intended('/admin');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => 'There was an error during login. Please try again later.']);
        }
    }

    public function signOut()
    {
        Auth::logout(); // Logs out the user
        request()->session()->invalidate(); // Invalidates the session
        request()->session()->regenerateToken(); // Regenerates the CSRF token for security
        return redirect('/admin/sign-in');
    }
}// End AuthenticationAdminController
