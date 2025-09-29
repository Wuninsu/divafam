<?php

namespace App\Livewire\Main;

use App\Models\Event;
use App\Models\Page;
use App\Models\Post;
use App\Models\Project;
use App\Models\Training;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class RestoreIndex extends Component
{

    // Holds the current search text from the UI
    public $search = '';

    // Holds the filter type: "all", "order", "errand", "transaction"
    public $filterType = 'all';

    public $type; // Holds the type of the record to be restored or deleted
    public $id; // Holds the ID of the record to be restored or deleted


    /**
     * Restore a soft-deleted record by type and ID.
     *
     * @param string $type (order|errand|transaction)
     * @param int $id
     */
    public function restore($type, $id)
    {
        // Get the model class, find the trashed record by ID, restore it
        $this->getModel($type)::onlyTrashed()->findOrFail($id)->restore();

        // Dispatch a Livewire browser event for notification
        $this->dispatch('notify', message: ucfirst($type) . " restored successfully!");
        flash()->success(ucfirst($type) . " restored successfully!");
    }


    /**
     * Permanently delete (force delete) a soft-deleted record.
     *
     * @param string $type (order|errand|transaction)
     * @param int $id
     */
    public function forceDelete($type, $id)
    {
        $this->type = $type;
        $this->id = $id;
        sweetalert()
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true, 'Cancel', 'blue')
            ->info('Are you sure you want to permanently delete this ' . $type . '?');


    }


    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload): void
    {
        $this->getModel($this->type)::onlyTrashed()->findOrFail($this->id)->forceDelete();
        flash(ucfirst($this->type) . " permanently deleted!", 'success', );

    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        flash()->info('Deletion cancelled.');
    }


    /**
     * Get the Eloquent model class based on the type string.
     *
     * @param string $type
     * @return string
     */
    private function getModel($type)
    {
        // Use PHP 8 match expression to return the right model
        return match ($type) {
            'project' => Project::class,
            'post' => Post::class,
            'page' => Page::class,
            'event' => Event::class,
            'training' => Training::class,
            'user' => User::class,
            default => abort(404, "Invalid type"),
        };
    }


    /**
     * Computed property: returns all trashed records combined
     * with search and filter applied.
     *
     * This means in Livewire you can just use `$this->records`
     * without calling this method directly.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getRecordsProperty()
    {
        // Fetch trashed projects and map them into a simple uniform array
        $projects = Project::onlyTrashed()->get()->map(fn($pr) => [
            'id' => $pr->id,
            'type' => 'project',
            'info' => "Project: {$pr->title}",
            'amount' => null,
            'deleted_at' => $pr->deleted_at,
        ]);

        // Fetch trashed posts
        $posts = Post::onlyTrashed()->get()->map(fn($p) => [
            'id' => $p->id,
            'type' => 'post',
            'info' => "Post: {$p->title}",
            'amount' => null,
            'deleted_at' => $p->deleted_at,
        ]);

        // Fetch trashed pages
        $pages = Page::onlyTrashed()->get()->map(fn($t) => [
            'id' => $t->id,
            'type' => 'page',
            'info' => "Page: {$t->title}",
            'amount' => null,
            'deleted_at' => $t->deleted_at,
        ]);

        // Users
        $users = User::onlyTrashed()->get()->map(fn($u) => [
            'id' => $u->id,
            'type' => 'user',
            'info' => "User: {$u->name} ({$u->email})",
            'amount' => null, // users don’t need amount
            'deleted_at' => $u->deleted_at,
        ]);


        // Events
        $events = Event::onlyTrashed()->get()->map(fn($ev) => [
            'id' => $ev->id,
            'type' => 'event',
            'info' => "Event: {$ev->title}",
            'amount' => null,
            'deleted_at' => $ev->deleted_at,
        ]);

        // Trainings
        $trainings = Training::onlyTrashed()->get()->map(fn($tr) => [
            'id' => $tr->id,
            'type' => 'training',
            'info' => "Training: {$tr->title}",
            'amount' => null,
            'deleted_at' => $tr->deleted_at,
        ]);


        // Merge all 3 collections into one
        $all = $projects->concat($posts)->concat($pages)->concat($users)
            ->concat($events)->concat($trainings);

        // If filter type is not "all", keep only matching type
        if ($this->filterType !== 'all') {
            $all = $all->where('type', $this->filterType);
        }

        // If search is set, filter the info column with case-insensitive match
        if ($this->search) {
            $all = $all->filter(
                fn($row) =>
                str($row['info'])->containsIgnoreCase($this->search)
            );
        }

        // Return results sorted by deleted date (latest first)
        return $all->sortByDesc('deleted_at');
    }

    public function render()
    {
        return view('livewire.main.restore-index');
    }
}
