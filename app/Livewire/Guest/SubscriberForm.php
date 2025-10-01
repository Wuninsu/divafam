<?php

namespace App\Livewire\Guest;

use Livewire\Component;

class SubscriberForm extends Component
{
    public $email;

    public function submit()
    {
        $this->validate([
            'email' => 'required|email',
        ]);

        \App\Models\Subscriber::updateOrCreate(
            ['email' => $this->email],
            []
        );

        $this->email = '';
        session()->flash('success', 'Subscription successful!');
    }
    public function render()
    {
        return view('livewire.guest.subscriber-form');
    }
}
