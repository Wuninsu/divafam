<?php

namespace App\Livewire\Main;

use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ProjectIndex extends Component
{

    use WithPagination;

    public string $status = '';
    public $projectId;
    public $search = '';
    protected $queryString = [
        'status' => ['except' => ''],
        'search' => ['except' => ''],
    ];

    public function deleteProject($id)
    {
        $this->projectId = $id;
        sweetalert()
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true, 'Cancel', 'blue')
            ->info('Are you sure you want to delete this project? Deleting a project is permanent and cannot be undone.');
    }

    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload): void
    {
        $project = Project::findOrFail($this->projectId);

        if ($project) {
            $deleted = deleteImage($project, 'cover_image');
            $project->delete();
            flash()->success('Project deleted successfully.');
        } else {
            flash()->warning('Project not found.');
        }
    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        flash()->info('Deletion cancelled.');
    }

    #[Title("Projects")]
    public function render()
    {
        $projects = Project::query()
            ->when(!auth('web')->user()->hasAnyRole(['div', 'admin', 'director']), function ($query) {
                $query->where('user_id', auth('web')->id());
            })
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->when($this->status, function ($query) {
                $query->where('status', $this->status);
            })
            ->latest()
            ->paginate(paginationLimit());

        $userId = auth('web')->id();

        $statusCounts = Project::query()
            ->when(!auth('web')->user()->hasAnyRole(['div', 'admin', 'director']), function ($query) {
                $query->where('user_id', auth('web')->id());
            })
            ->select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
        return view('livewire.main.project-index', compact('projects', 'statusCounts'));
    }
}
