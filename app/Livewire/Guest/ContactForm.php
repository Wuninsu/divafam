<?php

namespace App\Livewire\Guest;

use App\Models\ContactMessage;
use App\Models\Inquiry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ContactForm extends Component
{
    public $name, $email, $message, $phone, $subject;
    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2055',
            // 'phone' => 'nullable|regex:/^\d{10,13}$/',
            'subject' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            // Clean phone number
            // $this->phone = preg_replace('/\D/', '', $this->phone); 
            // Save the response as a child message
            $saved = Inquiry::create([
                'name' => $this->name,
                // 'phone' => $this->phone ?? 'N/A',
                'email' => $this->email,
                'type' => 'inquiry',
                'subject' => $this->subject,
                'message' => $this->message,
                'responded' => false,
            ]);

            if ($saved) {
                // Send SMS to the sender
                $data = [
                    'to' => $this->phone,
                    'message' => 'Your message has been received. Thank you for contacting JITDeliveries.',
                ];
                if ($this->phone) {
                    sendSMS($data);
                }

                // Send SMS to the admin (assuming you have a helper method for this)
                $adminPhone = setup_data('support_phone');
                if ($adminPhone) {
                    $adminData = [
                        'to' => $adminPhone,
                        'message' => 'You have a new message from ' . $this->name,
                    ];
                    sendSMS($adminData);
                }

                DB::commit();

                // Clear form fields
                $this->reset();
                session()->flash('success', 'Thank you for reaching out to us! Your message has been received, and we will get back to you shortly.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message submission failed', ['error' => $e->getMessage()]);
            session()->flash('errorMsg', 'Failed to send message: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.guest.contact-form');
    }
}
