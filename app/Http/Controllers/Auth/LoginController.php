<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function create()
    {
        return view('auth.login');
    }


    public function authenticated(LoginUserRequest $request)
    {
        $request->validated();

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role_as == 1) {
                Alert::success('Félicitations !', "Bienvenue sur votre tableau de bord");
                return redirect('admin/dashboard');
            } else {
                Alert::success('Félicitations !', "Bienvenue sur Diagui Shop");
                return redirect('/home');
            }
        } else {
            Alert::error('Error de connexion !', "Vérifiez vos identifiants");
            return redirect()->back()->withInput()->withErrors(['email' => "Les informations d'identification sont incorrectes."]);
        }
    }


    public function logout()
    {
        Auth::logout();

        Alert::success('Félicitations !', "Vous avez été déconnecté");

        return redirect('/');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->email)->first();
        if (!$user){
            $name = explode(" ",$googleUser->name );

            $user = User::create([
                'nom' => ucwords(strtolower($name[0])),
                'prenom' => ucwords(strtolower($name[1])),
                'email' => $googleUser->email,
                'telephone' => $googleUser->phone,
                'password' => Hash::make($googleUser->password)
            ]);
        }

        // $user->notify(new WelcomeNotification);

        $user->save();

        auth()->login($user, true);

        if (Auth::user()->role_as == 1) {
            Alert::success('Félicitations !', "Bienvenue sur votre tableau de bord");
            return redirect('admin/dashboard');
        } else {
            Alert::success('Félicitations !', "Bienvenue sur Diagui Shop");
            return redirect('/home');
        }
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // Logique pour gérer l'utilisateur Facebook dans votre application
    }
}
