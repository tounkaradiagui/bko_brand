<?php

namespace App\Http\Controllers\Admin\Navbar;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $mails = Contact::all();
        return view('admin.navbar.messages', compact('mails'));
    }

    public function showMessage($id)
    {
        $mails = Contact::where('id', $id)->first();

        if($mails)
        {

            return view('admin.navbar.mails', compact('mails'));
        }
        else
        {
            return redirect()->back()->with('message', 'Aucun message disponible');
        }
    }
}
