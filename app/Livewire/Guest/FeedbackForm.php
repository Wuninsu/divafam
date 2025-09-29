<?php

namespace App\Livewire\Guest;

use App\Models\Inquiry;
use Livewire\Component;
use Livewire\WithFileUploads;

class FeedbackForm extends Component
{
    use WithFileUploads;
    public $name, $email, $message, $subject, $status, $type = "feedback", $image, $position, $phone, $responded;

    public function submit()
    {

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'message' => 'required|string',
            'subject' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        // Handle file upload if a new image is selected
        if ($this->image) {
            $filePath = uploadFile($this->image, 'inquiry');
        }

        Inquiry::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
            'subject' => $this->subject,
            'responded' => $this->responded === null ? false : $this->responded,
            'type' => $this->type,
            'image' => $filePath ?? null,
            'position' => $this->position,
            'status' => $this->status === null ? false : $this->status,
        ]);

        $msg = "Inquiry created successfully!";


        $this->reset(['name', 'email', 'message', 'subject', 'status', 'type', 'image', 'position', 'phone', 'responded']);

        flash()->success($msg);
        session()->flash('success',$msg);
    }
    public function render()
    {
        return view('livewire.guest.feedback-form');
    }
}
