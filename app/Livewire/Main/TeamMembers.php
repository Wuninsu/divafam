<?php

namespace App\Livewire\Main;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class TeamMembers extends Component
{
    use WithPagination;
    // search input
    public $search = '';

    public function getUsersProperty()
    {
        // Query tag with optional search
        return User::query()
            ->whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', ['dev', 'guest', 'donor', 'beneficiary']);
            })
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(paginationLimit());
    }

    public function toggleTeamMember($userId)
    {
        $user = User::findOrFail($userId);
        $user->is_team_member = !$user->is_team_member;
        $user->save();

        flash('Team member status updated.', 'success');
    }


    public function toggleAdvisoryBoardMember($userId)
    {
        $user = User::findOrFail($userId);
        $user->is_advisory_board_member = !$user->is_advisory_board_member;
        $user->save();
        flash('Advisory board member status updated.', 'success');
    }



    public function render()
    {
        return view('livewire.main.team-members');
    }
}
