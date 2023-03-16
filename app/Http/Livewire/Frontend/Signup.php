<?php

namespace App\Http\Livewire\Frontend;

use App\Models\User;
use Livewire\Component;

class Signup extends Component
{
    public $nom, $prenom, $email, $password, $password_confirmation, $telephone;


    protected $listeners = [
        'validationForm',
        'signupUser' => 'saveData'
    ];


    protected $rules = [
        'nom' => 'required|string|min:3',
        'prenom' => 'required|string|min:3',
        'email' => ['required','email'],
        'telephone' => 'required|string|min:6|max:12',
        'password' => 'required|min:4',
    ];


    public function updated($inputName)
    {
        $this->validateOnly($inputName);
    }

    public function saveData()
    {
        $validatedData = $this->validate();

        User::create($validatedData);
        $this->dispatchBrowserEvent('message', [
            'text' => 'Félicitations ! Votre inscription a été effectué avec succès, Veuillez - vous connecter !!',
            'type' => 'success',
            'status' => 200
        ]);
        // $this->resetInput();

        return redirect()->to('login');
    }

    // public function resetInput()
    // {
    //     $this->nom = '';
    //     $this->prenom = '';
    //     $this->email = '';
    //     $this->telephone = '';
    //     $this->password = '';
    //     $this->password_confirmation = '';
    // }

    public function render()
    {
        return view('livewire.frontend.signup');
    }
}
