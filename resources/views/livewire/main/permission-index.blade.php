<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Permissions</li>
        </ol>
    </nav>
    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
        <!-- Permission Table -->
        <div class="row mx-2 mx-md-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Permissions</h5>
                <small class="text-muted">Manage all system permissions.</small>
            </div>
            <div class="row mb-3">
                <div class="col-md-9 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control form-control-sm"
                        placeholder="Search Permission...">
                </div>
                <div class="col-md-3">
                    <button class="btn add-new btn-primary" type="button" wire:click="createPermission">
                        <i class="fa fa-plus"></i>
                        Add Permission
                    </button>
                </div>
            </div>
            <div class="table-responsive scrollbar ms-n1">
                <table class="table table-sm fs-9 mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Assigned To</th>
                            <th  scope="col" style="width:19%; min-width:200px;">Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->permissions as $index => $permission)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="text-nowrap text-heading">{{ ucfirst($permission->name) }}</span>
                            </td>
                            <td>
                                @if ($permission->roles->count() || $permission->users->count())
                                <div>
                                    @if ($permission->roles->count())
                                    <span class="badge bg-primary">
                                        Roles: {{ $permission->roles->pluck('name')->join(', ') }}
                                    </span>
                                    @endif
                                    @if ($permission->users->count())
                                    <span class="badge bg-success">
                                        Users: {{ $permission->users->pluck('name')->join(', ') }}
                                    </span>
                                    @endif
                                </div>
                                @else
                                <button class="btn btn-sm btn-outline-secondary"
                                    wire:click="openAssignModal({{ $permission->id }})">
                                    Assign
                                </button>
                                @endif
                            </td>
                            <td>{{ $permission->created_at->format('d M Y, h:i A') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-outline-primary"
                                        wire:click='editPermission({{ $permission->id }})'>Edit</button>
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click='confirmDelete({{ $permission->id }})'>Delete</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">
                                No permissions found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot></tfoot>
                </table>
                @if ($this->permissions->hasPages())
                <div class="mt-3">
                    {{ $this->permissions->links() }}
                </div>
                @else
                <div class="mt-3 text-muted">
                    <em>No additional pages.</em>
                </div>
                @endif
            </div>
            <!--/ Permission Table -->

        </div>

        <!-- /Modal -->

        <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="permissionModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <form wire:submit.prevent="createOrUpdatePermission" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $permissionId ? 'Edit Permission' : 'Create Permission' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($permissionId)
                        <div class="alert alert-warning d-flex align-items-start" role="alert">
                            <span class="alert-icon me-4 rounded-1 p-1"><i
                                    class="icon-base ri ri-alert-line icon-22px"></i></span>
                            <div>
                                <h5 class="alert-heading mb-1">Warning</h5>
                                <p class="mb-0">By editing the permission name, you might break the system
                                    permissions functionality. Please ensure you're absolutely certain before
                                    proceeding.</p>
                            </div>
                        </div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Permission Name</label>
                            <input type="text" class="form-control" wire:model="name">
                            @error('name')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $permissionId ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Assign Permission Modal -->
        <div wire:ignore.self class="modal fade" id="assignModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <form wire:submit.prevent="assignPermission" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Permission</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <!-- Assign to -->
                        <div class="mb-3">
                            <label class="form-label">Assign To</label>
                            <select class="form-select @error('assignTo') is-invalid border-danger @enderror"
                                wire:model="assignTo">
                                <option value="role">Role</option>
                                <option value="user">User</option>
                            </select>
                            @error('assignTo')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Role selection -->
                        @if ($assignTo === 'role')
                        <div class="mb-3">
                            <label class="form-label">Select Role</label>
                            <select class="form-select @error('selectedRole') is-invalid border-danger
                                    @enderror" wire:model="selectedRole">
                                <option value="">-- choose role --</option>
                                @foreach (\Spatie\Permission\Models\Role::all() as $role)
                                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                @endforeach
                            </select>
                            @error('selectedRole')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif

                        <!-- User selection -->
                        @if ($assignTo === 'user')
                        <div class="mb-3">
                            <label class="form-label">Select User</label>
                            <select class="form-select @error('selectedUser') is-invalid border-danger
                                    @enderror" wire:model="selectedUser">
                                <option value="">-- choose user --</option>
                                @foreach (\App\Models\User::all() as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}
                                    ({{ $user->email }})
                                </option>
                                @endforeach
                            </select>
                            @error('selectedUser')
                            <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        @endif

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" wire:loading.attr="disabled">
                            <span wire:loading.remove>Assign</span>
                            <span wire:loading wire:target="assignPermission">
                                <i class="fas fa-spinner fa-spin"></i>
                                Assigning, please wait...
                            </span></button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    @script
    <script>
        // Listen to Livewire events and control modal
                Livewire.on('show-permission-modal', () => {
                    let modal = new bootstrap.Modal(document.getElementById('permissionModal'));
                    modal.show();
                });
    
                Livewire.on('hide-permission-modal', () => {
                    let modalEl = document.getElementById('permissionModal');
                    let modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();
                });
    
                Livewire.on('show-assign-modal', () => {
                    let modal = new bootstrap.Modal(document.getElementById('assignModal'));
                    modal.show();
                });
    
                Livewire.on('hide-assign-modal', () => {
                    let modalEl = document.getElementById('assignModal');
                    let modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();
                });
    </script>
    @endscript
</div>