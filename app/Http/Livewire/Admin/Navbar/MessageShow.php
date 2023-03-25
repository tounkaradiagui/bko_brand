<?php

namespace App\Http\Livewire\Admin\Navbar;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class MessageShow extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $messages = Contact::paginate(5);
        return view('livewire.admin.navbar.message-show', ['messages' => $messages]);
    }
}
