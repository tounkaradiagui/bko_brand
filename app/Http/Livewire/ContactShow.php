<?php

namespace App\Http\Livewire;

use App\Mail\ContactMailable;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ContactShow extends Component
{
    public $nom, $prenom, $email, $sujet, $message;


    protected $listeners = [
        'validationForm',
        'contact' => 'saveData'
    ];


    protected $rules = [
        'nom' => 'required|string|min:3',
        'prenom' => 'required|string|min:3',
        'email' => ['required','email'],
        'sujet' => 'required|string|min:10|max:200',
        'message' => 'required|string|min:50|max:3500'
    ];


    public function updated($inputName)
    {
        $this->validateOnly($inputName);
    }

    public function saveData()
    {
        $validatedData = $this->validate();

        if ($validatedData) {

            $contact = Contact::create([
                'nom' => $this->nom,
                'prenom' => $this->prenom,
                'email' => $this->email,
                'sujet' => $this->sujet,
                'message' => $this->message
            ]);

            try {
                Mail::to('goldenmarket.dev@gmail.com')->send(new ContactMailable($validatedData));
            } catch (\Throwable $th) {
                // throw $th;
            }

            $this->dispatchBrowserEvent('message', [
                'text' => "Félicitation ! Votre message a été envoyé",
                'type' => 'success',
                'status' => 200
            ]);

            return redirect()->to('/contact');
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => "Une erreur s'est produite, Veuillez réessayer",
                'type' => 'error',
                'status' => 500
            ]);
        }

    }

    public function render()
    {
        return view('livewire.contact-show');
    }
}
