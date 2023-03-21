<?php

namespace App\Actions;

use App\Mail\ContactMailable;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class EmailContactAction
{
    public function __invoke(array $formData)
    {
        $this->getOrCreateContact($formData);
    }

    private function getOrCreateContact(array $formData): Contact
    {
        return Contact::firstOrCreate($formData);
    }

    private function sendContactLeadToEmail(Contact $contactLead): void
    {
        Mail::to(['goldenmarket.dev@gmail.com'])
        ->send(new ContactMailable($contactLead));
    }
}
