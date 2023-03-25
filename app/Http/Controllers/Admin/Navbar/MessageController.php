<?php

namespace App\Http\Controllers\Admin\Navbar;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.navbar.messages');
    }
}
