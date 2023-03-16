<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }


    public function callbackFromFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();

            $saveUser = User::updateOrCreate([
                'facebook_id' => $user->getId(),
            ],
            [
                'nom' => $user->getNom(),
                'prenom' => $user->getPrenom(),
                'email' => $user->getEmail()
            ]);

            Auth::loginUsingId($saveUser->id);

            return redirect()->route('home');

        } catch (\Throwable $th) {
            // throw $th;
        }
    }
}
