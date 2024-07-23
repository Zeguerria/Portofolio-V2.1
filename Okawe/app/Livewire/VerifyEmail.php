<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class VerifyEmail extends Component
{
    public $email;
    public $emailExists = false;

    public function updatedEmail()
    {
        $this->emailExists = User::where('email', $this->email)->exists();
        $this->emit('emailChecked', $this->emailExists);
    }

    public function render()
    {
        return view('livewire.verify-email');
    }
}
