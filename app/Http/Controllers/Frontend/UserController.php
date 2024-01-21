<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
       return view('frontend.users.profile');
    }

    public function UpdateUserdetails(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
        $user->date_de_naissance = $request->input('date_de_naissance');
        $user->lieu_de_naissance = $request->input('lieu_de_naissance');
        $user->telephone = $request->input('telephone');
        $user->email = $request->input('email');
        $user->adresse = $request->input('adresse');

        if ($request->hasFile('image'))
        {
            $destination = 'uploads/profile/' .$user->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename =time().'.'.$ext;

            $file->move('uploads/profile/', $filename);
            $user->image = $filename;
        }

            $user->update();
            Alert::success('Félicitations !', "Votre profile a été modifié avec succès !");
            return redirect()->back();
    }


    public function getPassword()
    {
        return view('frontend.users.my-password');
    }

    public function UpdatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:4'],
            'password' => ['required', 'string', 'min:4', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);
            Alert::success('Félicitations !', "Votre mot de passe a été mise à jour");
            return redirect()->back();

        }else{
            Alert::error('Erreur !', "Desolé, le mot de passe ne correspond pas veuillez réessayer !");
            return redirect()->back();
        }
    }


}
