<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\SignupEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function welcomeEmail($nom, $email, $verification_code)
    {
        $data = [
            'nom' => $nom,
            'verification_code' => $verification_code

        ];

        Mail::to($email)->send(new SignupEmail($data));
    }
}
