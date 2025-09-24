<?php

namespace App\Livewire\Main;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserIndex extends Component
{
    use WithPagination;
    public $search = '';
    public $role = '';
    public $user_uuid, $roles;
    public $showDelete = false;
    public $userStats = [];


    protected $queryString = [
        'search' => ['except' => ''],
        'role' => ['except' => ''],
    ];

    public function mount()
    {
        $roles = Role::whereNotIn('name', ['dev'])->get();
        $this->roles = $roles;
        $this->loadStats();
    }


    public function deleteUser($uuid)
    {
        $this->user_uuid = $uuid;
        sweetalert()
            ->showDenyButton()
            ->info('Are you sure you want to delete the user?');
    }

    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload): void
    {
        $user = User::where('uuid', $this->user_uuid)->firstOrFail();

        if ($user) {

            $deleted = deleteImage($user, 'avatar_url');

            $user->delete();
            flash()->success('User deleted successfully.');
        } else {
            flash()->warning('User not found.');
        }
    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        flash()->info('Deletion cancelled.');
    }

    public function loadStats()
    {
        $this->userStats = [
            'total_users' => User::count(),
            'admins' => User::role('admin')->count(),
            'director' => User::role('director')->count(),
            'editors' => User::role('editor')->count(),
            'online_users' => User::where('updated_at', '>=', now()->subMinutes(5))->count(),
        ];
    }


    #[Title('Users')]
    public function render()
    {
        // Cache::put("user_phone", auth('web')->user()->phone, now()->addMinutes(2));

        $users = User::query()
            ->when(!auth('web')->user()->hasAnyRole(['dev']), function ($query) {
                $query->whereDoesntHave('roles', function ($query) {
                    $query->whereIn('name', ['dev']);
                });
            })
            ->when($this->role, function ($query) {
                $query->whereHas('roles', function ($q) {
                    $q->where('name', $this->role);
                });
            })
            ->when($this->search, function ($query) {
                $query->where(function ($q) {
                    $q->where('username', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('phone', 'like', '%' . $this->search . '%');
                });
            })
            ->latest()
            ->paginate(paginationLimit());

        return view('livewire.main.user-index', [
            'users' => $users
        ]);
    }

    public function sendMail($uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        if (!$user) {
            sweetalert()->error('User was not found.');
            return;
        }
        // Mail::to($user->email)->send(new ThankYou($user));
        try {
            // Send the "Thank You" email
            // Mail::to($user->email)->send(new ThankYou($user));
            // Mail::to($user->email)
            //     ->later(now()->addMinutes(2), new ThankYou($user));

            // Show a success message using SweetAlert
            sweetalert()->success('Thank You email has been sent successfully!');

            return back(); // Redirect back after email is sent
        } catch (\Exception $e) {
            // If something goes wrong, show an error message
            sweetalert()->error('There was an error sending the email.');
            return back();
        }
    }
}
