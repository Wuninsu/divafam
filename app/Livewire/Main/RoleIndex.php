<?php

namespace App\Livewire\Main;

use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleIndex extends Component
{

    public $roles;
    public $role;
    public $permissions = [];
    public $selectedPermissions = [];
    public $selectAll = false;
    public $role_name;

    #[On('refreshComponent')]
    public function mount()
    {
        $this->roles = Role::with('users')->get();
        $this->permissions = Permission::all();
    }

    public function togglePermission($roleId, $permissionId)
    {
        $role = Role::findOrFail($roleId);
        $permission = Permission::findOrFail($permissionId);

        if ($role->hasPermissionTo($permission->name)) {
            notyf()->success("$permission->name permission revoked from $role->name role");
            $role->revokePermissionTo($permission->name);
        } else {
            $role->givePermissionTo($permission->name);
            notyf()->success("$permission->name permission assign to $role->name role");
        }

        // Refresh data so the table updates
        $this->permissions = Permission::with('roles')->get();
    }

    public function loadRolePermission(Role $role)
    {
        // Load permissions for the given role
        $this->role = $role;
        $this->permissions = Permission::with('roles')->get();
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();
        $this->dispatch('show-modal');
    }


    public function toggleSelectAll($selectAll)
    {
        $permissionsCollection = collect($this->permissions);
        $this->selectedPermissions = $selectAll ? $permissionsCollection->pluck('id')->toArray() : [];
        $this->role->permissions()->sync($this->selectedPermissions);
        $this->dispatch('close-modal');
    }

    // Handle the "Select All" checkbox change
    public function updatedSelectAll($value)
    {
        if ($value) {
            $this->selectedPermissions = collect($this->permissions)->pluck('id')->toArray(); // Select all permissions
            // flash()->success('All permissions assigned successfully.');
        } else {
            $this->selectedPermissions = []; // Deselect all permissions
            // flash()->success('All permissions revoked successfully.');
        }

        // $this->dispatch('close-modal');
        // Sync the selected permissions to the role
        // $this->role->permissions()->sync($this->selectedPermissions);
        // app(PermissionRegistrar::class)->forgetCachedPermissions();
    }



    public function updatePermissions()
    {
        $this->role->permissions()->sync($this->selectedPermissions);
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        flash()->success('Role permissions updated successfully.');
        $this->dispatch('close-modal');
    }
    public function addNewRole()
    {
        // Validate the role name
        $this->validate([
            'role_name' => 'required|min:3|max:10|unique:roles,name',
        ]);

        try {
            // Create new role using Spatie's Role model
            Role::create([
                'name' => $this->role_name,
            ]);

            // Flash success message
            flash()->success('Role created successfully!');
            $this->dispatch('close-modal');
            $this->dispatch('refreshComponent');
        } catch (\Exception $e) {
            // Handle any errors and log them if needed
            flash()->error('Error creating role: ' . $e->getMessage());
        }

        // Optionally, clear the input after successful creation
        $this->role_name = ''; // Reset the role name input field
    }

    public $role_id;

    public function deleteRole($id)
    {
        // Assign role ID to class property
        $this->role_id = $id;

        // Check if the authenticated user has permission to delete a role
        if (!auth()->user()->can('manage roles')) {
            flash()->error('You do not have permission to delete this role.');
            return;
        }

        // Show confirmation dialog
        sweetalert()
            ->showConfirmButton(true, 'Yes, Delete it!', 'red')
            ->showDenyButton(true,'Cancel','blue')
            ->info('Are you sure you want to delete this role? Deleting a role is permanent and cannot be undone.');
    }


    #[On('sweetalert:confirmed')]
    public function onConfirmed(array $payload): void
    {
        $role = Role::findOrFail($this->role_id);

        if ($role) {
            // Ensure the role is not a default or system role that should not be deleted
            if ($role->name === 'dev' || $role->name === 'admin') {
                flash()->error('You cannot delete this role as it is a default system role.');
                return;
            }
            $role->delete();
            flash()->success('Role deleted successfully.');
            $this->dispatch('refreshComponent');
        } else {
            flash()->warning('Role not found.');
        }
    }

    #[On('sweetalert:denied')]
    public function onDeny(array $payload): void
    {
        flash()->info('Deletion cancelled.');
    }

    #[Title("Roles")]
    public function render()
    {
        return view('livewire.main.role-index');
    }
}
