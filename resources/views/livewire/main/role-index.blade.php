<div>
    <div class="">
        <h2 class="mb-2 lh-sm">Role List</h2>
        <p class="text-body-tertiary lead mb-2">{{__('A role provided access to predefined menus and features so that
            depending on assigned role an administrator can have
            access to what user needs.')}}</p>
        <div class="my-4">
            <div class="row g-3">
                @foreach ($roles as $role)
                <div class="col-md-4 col-sm-6">
                    <div class="card shadow-none border my-0" data-component-card="data-component-card">
                        <div class="card-header p-4 border-bottom bg-body">
                            <div class="row g-3 justify-content-between align-items-center">
                                <div class="col-12 col-md">
                                    <h4 class="text-body mb-0" data-anchor="data-anchor" id="square">
                                        {{ $role->users->count() }}
                                    </h4>
                                </div>
                                <div class="col col-md-auto">
                                    <nav class="nav justify-content-end doc-tab-nav align-items-center" role="tablist">
                                        <button class="btn btn-link px-2 text-body copy-code-btn" type="button">
                                            {{ $role->name }}</button>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="p-2 code-to-copy">
                                <div class="avatar-group mb-2 p-0">
                                    @foreach ($role->users->take(3) as $user)
                                    <div class="avatar avatar-m " data-bs-toggle="tooltip" title="{{ $user->name }}">
                                        <img class="rounded-circle " src="{{ asset($user->avatar ?? NO_IMAGE) }}"
                                            alt="avatar">
                                    </div>
                                    @endforeach

                                    @if ($role->users->count() > 3)
                                    <div class="avatar avatar-m " data-bs-toggle="tooltip"
                                        title="{{ $role->users->count() - 3 }} more">
                                        <div class="avatar-name rounded-circle "><span>+{{ $role->users->count()
                                                - 3 }}</span></div>
                                    </div>
                                    @endif

                                </div>
                                <div class="btn-group">
                                    <button wire:click="loadRolePermission({{ $role->id }})"
                                        class="btn btn-sm btn-primary"><i class="fa fa-edit"></i>
                                    </button>
                                    <button wire:click="deleteRole({{ $role->id }})"
                                        class="btn btn-sm btn-outline-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card h-100">
                        <div class="row h-100">
                            <div class="col-5">
                                <div class="d-flex align-items-center h-100 justify-content-center">
                                    <i class="ri ri-shield-line fa-5x"></i>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="card-body text-sm-end text-center ps-sm-0">
                                    <button @cannot('manage roles') disabled @endcannot data-bs-target="#addRoleModal" data-bs-toggle="modal"
                                        class="btn btn-sm btn-primary mb-4 text-nowrap add-new-role waves-effect waves-light">Add
                                        New Role</button>
                                    <p class="mb-0">Add role, if it does not exist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!--/ Role cards -->
    <div wire:ignore.self class="modal fade" id="editRoleModal" tabindex="-1" aria-labelledby="editRoleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoleModalLabel">Edit Role Permissions</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    <p class="text-muted mb-3">Set role permissions below:</p>

                    <form wire:submit.prevent="updatePermissions">
                        <!-- Select All -->
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" wire:model="selectAll" id="selectAll">
                            <label class="form-check-label" for="selectAll">Select All</label>
                        </div>

                        <!-- Permissions Grid -->
                        <div class="row">
                            @foreach ($permissions as $permission)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox"
                                        id="permission-{{ $permission['id'] }}" value="{{ $permission['id'] }}"
                                        wire:model="selectedPermissions">
                                    <label class="form-check-label" for="permission-{{ $permission['id'] }}">
                                        {{ $permission['name'] }}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </form>
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer border-top border-primary pt-3">
                    <button wire:click="updatePermissions" class="btn btn-primary">Update Permissions</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>





    <div wire:ignore.self class="modal fade" id="addRoleModal" class="modal fade" tabindex="-1"
        aria-labelledby="editRoleModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editRoleModalLabel">Add New System role</h5><button
                        class="btn btn-close p-1" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form wire:submit.prevent="addNewRole" class="row g-5">
                        <div class="col-12">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="role_name" wire:model='role_name' class="form-control @error('role_name') is-invalid border-danger
                                @enderror" placeholder="Role">
                                <label for="role_name">Role Name</label>
                            </div>
                            @error('role_name')
                            <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" wire:click="addNewRole" type="button">Submit</button>
                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    @script
   <script>
        $wire.on('close-modal', (event) => {
                    $('#editRoleModal').modal('hide');
                    $('#addRoleModal').modal('hide');
                });
                $wire.on('show-modal', (event) => {
                    $('#editRoleModal').modal('show');
                    $('#addRoleModal').modal('show');
                });
    </script>
    @endscript
</div>