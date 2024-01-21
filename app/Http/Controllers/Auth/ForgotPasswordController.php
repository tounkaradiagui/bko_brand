<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;


class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    public function showResetForm(Request $request, $token)
    {
        $email = $request->has('email') ? $request->email : null;

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $email]
        );
    }
}
