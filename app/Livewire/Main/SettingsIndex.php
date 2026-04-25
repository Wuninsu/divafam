<?php

namespace App\Livewire\Main;

use App\Models\Setting;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithPagination;

class SettingsIndex extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $filterType = '';
    public $search = '';
    public $editing;
    public $newSetup = [
        'key' => '',
        'value' => '',
        'type' => 'text',
        'status' => true,
    ];

    public function mount() {}


    public function edit(Setting $setup)
    {
        $this->editing = $setup->toArray();
        $this->dispatch('show-edit-modal');
    }

    public function update()
    {
        $setup = Setting::findOrFail($this->editing['id']);

        //If file type, handle uploads
        if ($this->editing['type'] === 'file' && $this->editing['value'] instanceof \Illuminate\Http\UploadedFile) {
            $filePath = uploadFile($this->editing['value'], 'uploads');
            $this->editing['value'] = $filePath;
            $deleted = deleteImage($setup, 'value');
        }

        $setup->update([
            'value' => $this->editing['value'],
            'type' => $this->editing['type'],
            'status' => $this->editing['status'],
        ]);

        $this->dispatch('hide-edit-modal');
        // Show success message
        notyf()->success('Entry updated successfully.');
    }
    public function create()
    {
        // Validate input
        $validated = $this->validate([
            'newSetup.key' => 'required|string|max:255|unique:setups,key',
            'newSetup.value' => 'nullable',
            'newSetup.type' => 'required|in:text,textarea,file',
            'newSetup.status' => 'boolean',
        ], [
            'newSetup.key' => 'The key field can not be null.',
            'newSetup.type' => 'The type field is can not be null'
        ]);

        // Handle file uploads
        if ($this->newSetup['type'] === 'file' && $this->newSetup['value'] instanceof \Illuminate\Http\UploadedFile) {
            $filePath = uploadFile($this->newSetup['value'], 'uploads');
            $this->newSetup['value'] = $filePath;
        }

        // Create new setup
        Setting::create($this->newSetup);

        // Reset form
        $this->reset('newSetup');
        $this->newSetup = [
            'key' => '',
            'value' => '',
            'type' => 'text',
            'status' => true,
        ];

        // Hide modal and reload data
        $this->dispatch('hide-add-modal');
        // show success message
        notyf()->success('New entry created successfully.');
    }

    public $id;

    public function deleteSetup($id)
    {
        $this->id = $id;

        sweetalert()
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true, 'Cancel', 'blue')
            ->info('Are you sure? Deleting this may break the app.');
    }

    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload): void
    {
        $data = Setting::find($this->id);

        if ($data) {
            if ($data->type === 'file') {
                deleteImage($data, 'value');
            }
            $data->delete();
            flash()->success('Data deleted successfully.');
        } else {
            flash()->warning('Data not found.');
        }
    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        flash()->info('Deletion cancelled.');
    }
    public function render()
    {
        $query = Setting::query();

        // Search by key
        if (!empty($this->search)) {
            $query->where('key', 'like', '%' . $this->search . '%');
        }

        // Filter by type (if set)
        if (!empty($this->filterType)) {
            $query->where('type', $this->filterType);
        }

        // Order by type: file first, then text, then textarea
        $query->orderByRaw("FIELD(type, 'file', 'text', 'textarea')");

        // Paginate the results
        $setups = $query->orderBy('key')->paginate(paginationLimit());

        return view('livewire.main.settings-index', compact('setups'));
    }
}
