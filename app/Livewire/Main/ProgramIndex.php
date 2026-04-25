<?php

namespace App\Livewire\Main;

use App\Models\Program;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProgramIndex extends Component
{

    use WithPagination;
    use WithFileUploads;

    public string $status = '';
    public $programId;
    public $search = '';
    protected $queryString = [
        'status' => ['except' => ''],
        'search' => ['except' => ''],
    ];

    public $name, $description, $is_active, $image;
    public $existingImage;

    /**
     * Open modal to create new program
     */
    public function openModal()
    {
        $this->reset(['programId', 'description', 'is_active', 'name']);
        $this->dispatch('show-program-modal');
    }

   
    public function edit($id)
    {
        $program = Program::findOrFail($id);

        $this->programId = $program->id;
        $this->name = $program->name;
        $this->description = $program->description;
        $this->is_active = $program->is_active;

        $this->existingImage = $program->image; // IMPORTANT
        $this->dispatch('show-program-modal');
    }

    /**
     * Handle create or update
     */

    public function createOrUpdateProgram()
    {
        $this->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:programs,name,' . $this->programId,
            ],
            'description' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        DB::beginTransaction();

        try {
            $filePath = null;

            if ($this->programId) {
                // UPDATE
                $program = Program::findOrFail($this->programId);

                // Handle image replacement
                if ($this->image) {
                    if ($program->image) {
                        $oldPath = str_replace('/storage/', '', $program->image);
                        if (Storage::disk('public')->exists($oldPath)) {
                            Storage::disk('public')->delete($oldPath);
                        }
                    }

                    $filePath = uploadFile($this->image, 'uploads/programs');
                }

                $program->update([
                    'name' => $this->name,
                    'slug' => $this->generateUniqueSlug($this->name, $program->id),
                    'description' => $this->description,
                    'image' => $filePath ?? $program->image,
                    'is_active' => (bool) $this->is_active,
                ]);

                $msg = "Program updated successfully!";
            } else {
                // CREATE
                if ($this->image) {
                    $filePath = uploadFile($this->image, 'uploads/programs');
                }

                Program::create([
                    'name' => $this->name,
                    'slug' => $this->generateUniqueSlug($this->name),
                    'description' => $this->description,
                    'image' => $filePath,
                    'is_active' => (bool) $this->is_active,
                ]);

                $msg = "Program created successfully!";
            }

            DB::commit();

            // Reset form
            $this->reset(['programId', 'name', 'description', 'image', 'is_active']);

            $this->dispatch('hide-program-modal');
            flash()->success($msg);
            $this->dispatch('notify', message: $msg);
        } catch (\Throwable $e) {
            DB::rollBack();

            report($e);

            $this->dispatch('notify', message: 'Something went wrong. Please try again.');
        }
    }

    protected function generateUniqueSlug($name, $ignoreId = null)
    {
        $slug = Str::slug($name);
        $original = $slug;
        $count = 1;

        while (
            Program::where('slug', $slug)
            ->when($ignoreId, fn($q) => $q->where('id', '!=', $ignoreId))
            ->exists()
        ) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }

    public function deleteProgram($id)
    {
        $this->programId = $id;
        sweetalert()
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true, 'Cancel', 'blue')
            ->info('Are you sure you want to delete this program? Deleting a program is permanent and cannot be undone.');
    }

    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload): void
    {
        $program = program::findOrFail($this->programId);

        if ($program) {
            $deleted = deleteImage($program, 'cover_image');
            $program->delete();
            flash()->success('program deleted successfully.');
        } else {
            flash()->warning('program not found.');
        }
    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        flash()->info('Deletion cancelled.');
    }

    #[Title("programs")]
    public function render()
    {

        $baseQuery = Program::query()
            // ->when(!auth('web')->user()->hasAnyRole(['div', 'admin', 'director']), function ($query) {
            //     $query->where('user_id', auth('web')->id());
            // })
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            });
        $programs = (clone $baseQuery)
            // ->when($this->status !== null, function ($query) {
            //     $query->where('is_active', $this->status); // FIXED (was status)
            // })
            ->latest()
            ->paginate(paginationLimit());
        $statusCounts = [
            'active' => (clone $baseQuery)->where('is_active', 1)->count(),
            'inactive' => (clone $baseQuery)->where('is_active', 0)->count(),
        ];
        return view('livewire.main.program-index', compact('programs', 'statusCounts'));
    }
}
