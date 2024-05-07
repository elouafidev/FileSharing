<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth.visitor');
    }

    public function index()
    {
        $user = Auth::user();
        return view('front.pages.profile', compact('user'));
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->input('name'),
            'password' => Hash::make($request->input('password')),
        ]);
        return Redirect::back()->with('success', __('Profile updated successfully'));
    }
}
