<?php

namespace App\Livewire\Main\Pages;

use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;

use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Livewire\Attributes\On;

class DocumentIndex extends Component
{
    use WithFileUploads, WithPagination;

    public $isEdit = false;
    public $documentId;

    public $title, $description, $file,$custom_name;

    protected function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'file' => $this->isEdit
                ? ['nullable', 'file', 'mimes:png,jpg,pdf,doc,docx']
                : ['required', 'file', 'mimes:png,jpg,pdf,doc,docx'],
        ];
    }

    public function createUpdate()
    {
        $this->validate();

        $data = [
            'file_name' => $this->title,
            'file_description' => $this->description,
        ];

        // Handle file upload
        if ($this->file) {
            $path = uploadFile($this->file, 'uploads/documents',$this->custom_name);

            $data['file_path'] = $path;
            $data['file_type'] = $this->file->getClientOriginalExtension();
            $data['file_size'] = $this->file->getSize();
        }

        if ($this->isEdit) {
            $document = Document::findOrFail($this->documentId);

            // delete old file if new one uploaded
            if ($this->file && $document->file_path && Storage::disk('public')->exists($document->file_path)) {
                deleteFile($document, 'file_path');
            }
            $document->update($data);

            flash('Document updated successfully.', 'success');
        } else {
            Document::create($data);

            flash('Document created successfully.', 'success');
        }

        $this->resetFields();
        $this->dispatch('hide-modal');
    }

    public function updatedTitle(){
        $this->custom_name = Str::slug($this->title);
    }

    public function edit($id)
    {
        $doc = Document::findOrFail($id);

        $this->documentId = $doc->id;
        $this->title = $doc->file_name;
        $this->description = $doc->file_description;

        $this->isEdit = true;

        $this->dispatch('show-modal');
    }



    public $deleteId;
    /**
     * Prompt delete confirmation
     */
    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        sweetalert()
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true, 'Cancel', 'blue')
            ->info('Are you sure you want to delete this document?');
    }

    /**
     * Handle confirmed delete
     */
    #[On('sweetalert:confirmed')]
    public function onConfirmed()
    {
        if ($this->deleteId) {
            $doc = Document::findOrFail($this->deleteId);

            $path = str_replace('/storage/', '', $doc->file_path);
            if ($doc->file_path && Storage::disk('public')->exists($path)) {
                deleteFile($doc, 'file_path');
            }
            $doc->delete();
            flash('Document deleted.', 'success');
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


    public function openModal()
    {
        $this->resetFields();
        $this->isEdit = false;

        $this->dispatch('show-modal');
    }

    public function resetFields()
    {
        $this->reset(['title', 'description', 'file', 'documentId', 'isEdit']);
    }

    public function render()
    {
        return view('livewire.main.pages.document-index', [
            'documents' => Document::latest()->paginate(10),
        ]);
    }
}
