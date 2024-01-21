<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;


class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    /**
     * Get the user for the password reset request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function getUser($request)
    {
        return User::where('email', $request->input('email'))->first();
    }

    public function reset(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        // Get the user from the request or however you retrieve it
        $user = $this->getUser($request);

        // Get the password from the request
        $password = $request->input('password');

        // Reset the user's password
        $this->resetPassword($user, $password);
        Alert::success('Félicitations !', "Votre mot de passe a été mise à jour");
        return redirect($this->redirectPath())->with('status', trans('passwords.reset'));
    }

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
