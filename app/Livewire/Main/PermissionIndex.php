<?php

namespace App\Livewire\Main;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionIndex extends Component
{

    use WithPagination;
    // search input
    public $search = '';
    // Modal variables
    public $permissionId = null;
    public $name = '';

    // For delete
    public $deleteId = null;
    public $assignPermissionId = null;
    public $selectedRole = null;


    public $assignTo = 'role'; // default type (role or user)
    public $selectedUser = null;

    /**
     * Computed property to get filtered permissions
     */
    public function getPermissionsProperty()
    {
        // Query permissions with optional search
        return Permission::query()
            ->with('roles', 'users') // eager load roles that use the permission
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(paginationLimit());
    }


    /**
     * Open modal to create new permission
     */
    public function createPermission()
    {
        $this->reset(['permissionId', 'name']);
        $this->dispatch('show-permission-modal');
    }

    /**
     * Load permission info into modal for editing
     */
    public function editPermission($id)
    {
        $permission = Permission::findOrFail($id);

        $this->permissionId = $permission->id;
        $this->name = $permission->name;

        $this->dispatch('show-permission-modal');
    }

    /**
     * Handle create or update
     */
    public function createOrUpdatePermission()
    {
        $this->validate([
            'name' => 'required|string|max:255|unique:permissions,name,' . $this->permissionId,
        ]);

        if ($this->permissionId) {
            // update
            $permission = Permission::findOrFail($this->permissionId);
            $permission->update(['name' => $this->name]);

            $msg = "Permission updated successfully!";
        } else {
            // create
            Permission::create(['name' => $this->name]);
            $msg = "Permission created successfully!";
        }

        $this->reset(['permissionId', 'name']);
        $this->dispatch('hide-permission-modal');
        flash()->success($msg);
        $this->dispatch('notify', message: $msg);
    }

    /**
     * Prompt delete confirmation
     */
    public function confirmDelete($id)
    {
        $this->deleteId = $id;

        // Check if the authenticated user has permission to delete a role
        if (!auth('web')->user()->can('manage permissions')) {
            flash()->error('You do not have the right permission to delete this permission.');
            return;
        }

        // Show confirmation dialog
        $timer = 20000;
        sweetalert()
            ->timer($timer)
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true, 'Cancel', 'blue')
            ->info('Are you sure you want to delete this permission? Deleting a permission is permanent and cannot be undone.');
    }

    /**
     * Handle confirmed delete
     */
    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload): void
    {
        $permission = Permission::findOrFail($this->deleteId);

        if ($permission) {
            // delete permission
            $permission->delete();
            flash()->success('Permission deleted successfully.');
        } else {
            flash()->warning('Permission not found.');
        }
    }

    /**
     * Handle denied delete
     */

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        $this->deleteId = null;
        $this->dispatch('notify', message: "Deletion cancelled.");
        flash()->info('Deletion cancelled.');
    }


    public function openAssignModal($id)
    {
        $this->reset(['assignTo', 'selectedRole', 'selectedUser']);
        $this->assignPermissionId = $id;
        $this->dispatch('show-assign-modal');
    }

    public function assignPermission()
    {
        $permission = Permission::findOrFail($this->assignPermissionId);

        if ($this->assignTo === 'role') {
            $this->validate(['selectedRole' => 'required|exists:roles,name']);
            $role = Role::where('name', $this->selectedRole)->firstOrFail();
            //  Add without removing existing
            if (!$role->hasPermissionTo($permission)) {
                $role->givePermissionTo($permission);
            }
        } else {
            $this->validate(['selectedUser' => 'required|exists:users,id']);
            $user = User::findOrFail($this->selectedUser);
            //  Add without removing existing
            if (!$user->hasPermissionTo($permission)) {
                $user->givePermissionTo($permission);
            }
        }

        $this->dispatch('hide-assign-modal');
        flash("Permission assigned successfully!", 'success');
        $this->reset(['assignPermissionId', 'assignTo', 'selectedRole', 'selectedUser']);
    }

    #[Title("Permissions")]
    public function render()
    {
        return view('livewire.main.permission-index');
    }
}

