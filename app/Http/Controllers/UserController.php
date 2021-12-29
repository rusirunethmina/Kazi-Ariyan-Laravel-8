<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'User Logout');
    }

    public function changePassword()
    {
        return view('admin.pages.change_password');
    }

    public function updatePassword(Request $request)
    {
        $validatedata = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return Redirect()->route('login')->with('success', 'Password is changed Successfully');
        } else {
            return Redirect()->back()->with('error', 'Current Password is Invalid');
        }
    }

    public function userProfile()
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            if ($user) {
                return view('admin.pages.update_profile', compact('user'));
            }
        }
    }

    public function updateUserProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        if ($user) {
            $user->name = $request['name'];
            $user->email = $request['email'];

            $user->save();
            return Redirect()->back()->with('success', 'Update profile Successfully');
        } else {
            return Redirect()->back();
        }
    }
}
