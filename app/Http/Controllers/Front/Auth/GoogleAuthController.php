<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::where('google_id', $googleUser->getId())->first();
            if(empty($user)){
                $user = User::where('email',$googleUser->getEmail())->first();
                if(empty($user)){
                    $user =User::Create([
                        'name' => $googleUser->getName(),
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'email_verified_at' => now(),
                    ]);
                }
                $user->google_id = $googleUser->getId();
                if($user->email_verified_at) $user->email_verified_at = now();
                $user->save();
            }
            Auth::login($user);
            return Redirect::route('home');
        }catch(\Exception $e){
            return Redirect::route('login');
        }

    }
}
