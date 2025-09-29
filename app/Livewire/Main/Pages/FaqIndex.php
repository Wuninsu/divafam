<?php

namespace App\Livewire\Main\Pages;

use App\Models\Faq;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class FaqIndex extends Component
{
    use WithPagination;
    // search input
    public $search = '';
    // Modal variables
    public $faqId;
    public $question, $answer, $status;

    // For delete
    public $deleteId = null;
    /**
     * Computed property to get filtered faqs
     */
    public function getFaqsProperty()
    {
        // Query faq with optional search
        return Faq::query()
            ->when($this->search, function ($query) {
                $query->where('question', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(paginationLimit());
    }


    /**
     * Open modal to create new faq
     */
    public function createFaq()
    {
        $this->reset(['faqId', 'question', 'answer']);
        $this->dispatch('show-faq-modal');
    }

    /**
     * Load faq info into modal for editing
     */
    public function editFaq($id)
    {
        $faq = Faq::findOrFail($id);

        $this->faqId = $faq->id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
        $this->status = $faq->is_active == 1 ? true : false;
        $this->dispatch('show-faq-modal');
    }

    /**
     * Handle create or update
     */
    public function createOrUpdateFaq()
    {
        $this->validate([
            'question' => 'required|string|max:255|unique:faqs,question,' . $this->faqId,
            'answer' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        if ($this->faqId) {
            // update
            $faq = Faq::findOrFail($this->faqId);
            $faq->update([
                'question' => $this->question,
                'answer' => $this->answer,
                'is_active' => $this->status,
            ]);

            $msg = "faq updated successfully!";
        } else {
            // create
            Faq::create([
                'question' => $this->question,
                'answer' => $this->answer,
                'is_active' => $this->status === null ? false : $this->status,
            ]);
            $msg = "faq created successfully!";
        }

        $this->reset(['faqId', 'answer', 'question', 'status']);
        $this->dispatch('hide-faq-modal');
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
            ->info('Are you sure you want to delete this enquiry? This will permanently delete the enquiry.');
    }

    /**
     * Handle confirmed delete
     */
    #[On('sweetalert:confirmed')]
    public function onConfirmed()
    {
        if ($this->deleteId) {
            Faq::findOrFail($this->deleteId)->delete();
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
        return view('livewire.main.pages.faq-index');
    }
}
