<?php

namespace App\Http\Livewire\Admin\Navbar;

use App\Mail\ContactMailable;
use App\Models\Contact;
use App\Models\MailResponse;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;

class MessageShow extends Component
{
    public $nom, $prenom, $email, $sujet, $message;

    protected $listeners = [
        'validationForm',
        'mail' => 'sendMailToUser'
    ];

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $rules = [
        'nom' => 'required|string|min:3',
        'prenom' => 'required|string|min:3',
        'email' => ['required','email'],
        'sujet' => 'required|string|min:10|max:200',
        'message' => 'required|string|min:50|max:3500'
    ];

    public function resetInput()
    {
        $this->nom = NULL;
        $this->prenom = NULL;
        $this->email = NULL;
        $this->sujet = NULL;
        $this->message = NULL;
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function sendMailToUser()
    {
        $validatedData = $this->validate();

        if($validatedData)
        {
            MailResponse::create([
            'nom' => $this->nom,
            'prenom' => $this->prenom,
            'email' => $this->email,
            'sujet' => $this->sujet,
            'message' => $this->message
            ]);
            
            try {
                Mail::to($this->email)->send(new ContactMailable($validatedData));
            } catch (\Throwable $th) {
                // throw $th;
            }

            $this->dispatchBrowserEvent('message', [
                'text' => "Félicitation ! Votre message a été envoyé",
                'type' => 'success',
                'status' => 200
            ]);

            return redirect()->to('/messages');
            $this->resetInput();
            $this->dispatchBrowserEvent('close-modal');
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
        $messages = Contact::paginate(5);
        return view('livewire.admin.navbar.message-show', ['messages' => $messages]);
    }
}
