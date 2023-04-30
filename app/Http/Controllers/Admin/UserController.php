<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'max:20'],
            'role_as' => ['required', 'integer']
        ]);

        User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as
        ]);

        return redirect('/admin/users')->with('message', 'Nouvel utilisateur ajouté avec succès');
    }

    public function edit(int $userId)
    {
        $getUser = User::findOrFail($userId);
        return view('admin.user.edit', compact('getUser'));
    }

    public function update(Request $request, int $userId)
    {
        $validateData = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:3', 'max:20'],
            'role_as' => ['required', 'integer']
        ]);

        User::findOrFail($userId)->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'password' => Hash::make($request->password),
            'role_as' => $request->role_as
        ]);

        return redirect('/admin/users')->with('message', 'Utilisateur mise à jour avec succès');
    }

    public function destroy(int $userId)
    {
        $deleteUser = User::findOrFail($userId);
        $deleteUser->delete();

        return redirect('/admin/users')->with('message', 'Utilisateur supprimé avec succès');
    }

    /**
     * update users status
     *@param int $user_id
     *@param int $status_code
     *@return Success Response
     *
     * */

    public function updateStatus($user_id, $status_code)
    {
        try {
           $update_user = User::whereId($user_id)->update([
                'statut' => $status_code
           ]);

           if($update_user)
           {
            return redirect()->route('users.index')->with('message', "Le status de l'utilisateur a été modifié avec succès ");

        }
            return redirect()->route('users.index')->with('error', "Echec de modification, veuillez réessayer ! ");

        } catch (\Throwable $th) {
            throw $th;
        }
    }

 

    public function sendEmailVerification(int $orderId)
    {
        // try {


        //     Mail::to("$order->email")->send(new InvoiceOrderMailable($order));
        //     return redirect('admin/orders/'.$orderId)->with('message','Félicitations !! La facture a été envoyée à '.$order->email);
        // } catch(\Exception $e){

        //     return redirect('admin/orders/'.$orderId)->with('error',"Erreur d'envoi de mail, veuillez réessayer ");
        // }

    }
}
