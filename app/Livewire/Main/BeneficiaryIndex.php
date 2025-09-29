<?php

namespace App\Livewire\Main;

use App\Exports\ExportBeneficiaries;
use App\Imports\FilePreviewImport;
use App\Imports\ImportBeneficiaries;
use App\Models\Beneficiary;
use App\Models\Project;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\HeadingRowImport;

class BeneficiaryIndex extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $search = '';
    public $beneficiaryId;
    public $name, $phone, $gender, $age, $notes, $project_id;
    public $projects;
    public $loading = false;
    public $file;
    public $beneficiaryCount = 0;


    public function mount()
    {
        $this->projects = Project::all();
    }

    public $deleteId = null;
    /**
     * Computed property to get filtered beneficiaries
     */
    public function getBeneficiariesProperty()
    {
        // Query beneficiary with optional search
        return Beneficiary::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(paginationLimit());
    }


    /**
     * Open modal to create new beneficiary
     */
    public function createBeneficiary()
    {
        $this->reset(['beneficiaryId', 'name', 'phone', 'age', 'notes', 'project_id']);
        $this->dispatch('show-beneficiary-modal');
    }

    public function openImportModal()
    {
        $this->reset(['beneficiaryId', 'name', 'phone', 'age', 'notes', 'project_id']);
        $this->dispatch('open-import-modal');
    }

    public function updatedFile()
    {
        // Preview the file and count the rows
        if ($this->file) {
            $this->loading = true;

            // Use the FilePreviewImport to read the file and get the array of data
            $import = new FilePreviewImport();
            $data = Excel::toArray($import, $this->file);

            // Get the number of rows in the file (exclude the header)
            $this->beneficiaryCount = count($data[0]) - 1; // Exclude the header row

            $this->loading = false;
        }
    }

    public function importBeneficiary()
    {
        // Validate the data
        $this->validate([
            'project_id' => 'required|exists:projects,id',
            'file' => 'required|file|mimes:xlsx,csv|max:2048',
            'notes' => 'nullable|string|max:500',
        ]);

        // Import the beneficiaries
        Excel::import(new ImportBeneficiaries($this->project_id, $this->notes), $this->file);

        // Success message
        flash('Beneficiaries imported successfully.', 'success');

        $this->beneficiaries;
        $this->reset(['file', 'notes', 'project_id','beneficiaryCount']);
        // Close the modal (via JS)
        $this->dispatch('hide-import-modal');
    }
    /**
     * Load beneficiary info into modal for editing
     */
    public function editBeneficiary($id)
    {
        $beneficiary = Beneficiary::findOrFail($id);

        $this->beneficiaryId = $beneficiary->id;
        $this->name = $beneficiary->name;
        $this->phone = $beneficiary->phone;
        $this->gender = $beneficiary->gender;
        $this->age = $beneficiary->age;
        $this->notes = $beneficiary->notes;
        $this->project_id = $beneficiary->project_id;
        $this->dispatch('show-beneficiary-modal');
    }

    public function createOrUpdateBeneficiary()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|string',
            'age' => 'nullable|integer|min:0',
            'notes' => 'nullable|string',
            'project_id' => 'nullable|exists:projects,id',
        ]);

        if ($this->beneficiaryId) {
            // Update existing beneficiary
            $beneficiary = Beneficiary::find($this->beneficiaryId);
            $beneficiary->update([
                'name' => $this->name,
                'phone' => $this->phone,
                'gender' => $this->gender,
                'age' => $this->age,
                'notes' => $this->notes,
                'project_id' => $this->project_id,
            ]);
            flash('Beneficiary updated successfully!', 'success');
        } else {
            // Create new beneficiary
            Beneficiary::create([
                'name' => $this->name,
                'phone' => $this->phone,
                'gender' => $this->gender,
                'age' => $this->age,
                'notes' => $this->notes,
                'project_id' => $this->project_id,
            ]);
            flash('Beneficiary created successfully!', 'success');
        }

        // Reset the form
        $this->reset(['beneficiaryId', 'name', 'phone', 'age', 'notes', 'project_id']);
        $this->dispatch('hide-beneficiary-modal');
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
            ->info('Are you sure you want to delete this beneficiary? This will permanently delete the beneficiary.');
    }

    /**
     * Handle confirmed delete
     */
    #[On('sweetalert:confirmed')]
    public function onConfirmed()
    {
        if ($this->deleteId) {
            Beneficiary::findOrFail($this->deleteId)->delete();
            $this->deleteId = null;
            flash("Beneficiary deleted!", 'success');
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

    public function export()
    {
        return Excel::download(new ExportBeneficiaries, 'beneficiaries.xlsx');
    }

    public function render()
    {
        return view('livewire.main.beneficiary-index');
    }
}
