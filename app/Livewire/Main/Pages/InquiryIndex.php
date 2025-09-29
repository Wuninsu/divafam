<?php

namespace App\Livewire\Main\Pages;

use App\Models\Inquiry;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class InquiryIndex extends Component
{
    use WithPagination;
    use WithFileUploads;
    // search input
    public $search = '';
    // Modal variables
    public $inquiryId;
    public $name, $email, $message, $subject, $status, $type = "testimony", $image, $position, $phone, $responded;
    public $showImage;
    // For delete
    public $deleteId = null;
    /**
     * Computed property to get filtered inquirys
     */
    public function getInquiriesProperty()
    {
        // Query inquiry with optional search
        return Inquiry::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(paginationLimit());
    }


    /**
     * Open modal to create new inquiry
     */
    public function createInquiry()
    {
        $this->reset(['inquiryId', 'name', 'email', 'message', 'subject', 'status', 'type', 'image', 'position', 'phone', 'responded']);
        $this->dispatch('show-inquiry-modal');
    }

    /**
     * Load inquiry info into modal for editing
     */
    public function editInquiry($id)
    {
        $inquiry = inquiry::findOrFail($id);

        $this->inquiryId = $inquiry->id;
        $this->name = $inquiry->name;
        $this->email = $inquiry->email;
        $this->message = $inquiry->message;
        $this->subject = $inquiry->subject;
        $this->type = $inquiry->type;
        $this->showImage = $inquiry->image;
        $this->position = $inquiry->position;
        $this->phone = $inquiry->phone;
        $this->responded = $inquiry->responded;
        $this->status = $inquiry->status == 1 ? true : false;
        $this->dispatch('show-inquiry-modal');
    }

    /**
     * Handle create or update
     */
    public function createOrUpdateInquiry()
    {

        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'message' => 'required|string',
            'subject' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
        ]);

        $inquiry = Inquiry::find($this->inquiryId);
        $filePath = $inquiry ? $inquiry->image : null;

        // Handle file upload if a new image is selected
        if ($this->image) {
            if ($filePath && Storage::disk('public')->exists($inquiry->image)) {
                deleteImage($inquiry, 'image');
            }
            $filePath = uploadFile($this->image, 'inquiry');
        }


        if ($this->inquiryId) {
            // update
            $inquiry = Inquiry::find($this->inquiryId);
            $inquiry->update([
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->message,
                'subject' => $this->subject,
                'responded' => $this->responded,
                'type' => $this->type,
                'image' => $filePath,
                'position' => $this->position,
                'status' => $this->status,
            ]);

            $msg = "Inquiry updated successfully!";
        } else {
            // create
            Inquiry::create([
                'name' => $this->name,
                'email' => $this->email,
                'message' => $this->message,
                'subject' => $this->subject,
                'responded' => $this->responded === null ? false : $this->responded,
                'type' => $this->type,
                'image' => $filePath,
                'position' => $this->position,
                'status' => $this->status === null ? false : $this->status,
            ]);
            $msg = "Inquiry created successfully!";
        }

        $this->reset(['inquiryId', 'name', 'email', 'message', 'subject', 'status', 'type', 'image', 'position', 'phone', 'responded']);
        $this->dispatch('hide-inquiry-modal');
        flash()->success($msg);
        $this->dispatch('notify', message: $msg);
    }

    /**
     * Prompt delete confirmation
     */
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        sweetalert()
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true, 'Cancel', 'blue')
            ->info('Are you sure you want to delete this inquiry? This will permanently delete the inquiry.');
    }

    /**
     * Handle confirmed delete
     */
    #[On('sweetalert:confirmed')]
    public function onConfirmed()
    {
        if ($this->deleteId) {
            Inquiry::findOrFail($this->deleteId)->delete();
            $this->deleteId = null;
            flash("Enquiry deleted!", 'success');
        }
    }

    /**
     * Handle denied delete
     */
    #[On('sweetalert:denied')]
    public function onDeny()
    {
        $this->deleteId = null;
        flash('Deletion cancelled', 'info');
        $this->dispatch('notify', message: "Deletion cancelled.");
    }
    public function render()
    {
        return view('livewire.main.pages.inquiry-index');
    }
}
