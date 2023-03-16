<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function signup(Request $request)
    {
        return view('frontend.signup.index');
    }
}
