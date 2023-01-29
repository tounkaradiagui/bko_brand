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
        $users = User::paginate('10');
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
}