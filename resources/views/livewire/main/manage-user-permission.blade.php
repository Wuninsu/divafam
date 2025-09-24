<div>
    <div>
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#!">Users</a></li>
                <li class="breadcrumb-item active">Manage User Permission</li>
            </ol>
        </nav>
        <div class="mx-n4 mx-lg-n6 py-4 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">
                    <i class="bi bi-shield-lock-fill me-2"></i> Manage Permissions for <span class="fw-semibold"><i>({{
                            $user->name }})</i></span>
                </h4>
            </div>

            <form wire:submit.prevent="updateUserPermissions">
                <div class="mb-4">
                    <label class="form-label fw-bold">All Permissions</label>
                    <div class="row">
                        @foreach ($allPermissions->chunk(ceil($allPermissions->count() / 3)) as $chunk)
                        <div class="col-md-4">
                            <ul class="list-group list-group-flush">
                                @foreach ($chunk as $permission)
                                <li class="list-group-item px-0 py-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="perm-{{ $permission->id }}"
                                            value="{{ $permission->name }}" wire:model="permissions">
                                        <label class="form-check-label" for="perm-{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="alert alert-info" role="alert">
                    <strong>Note:</strong> This form allows you to <strong>update only direct user-specific
                        permissions</strong>.
                    Permissions inherited from roles will remain unchanged. To manage role-based permissions, please
                    update the user's
                    roles separately.
                </div>

                <div class="alert alert-warning" role="alert">
                    <strong>Revoke Notice:</strong> Clicking the <strong>“Revoke All Permissions”</strong> button will
                    remove <u>all
                        user-specific permissions</u>.
                    This does <strong>not affect permissions granted through roles</strong>.
                </div>


              <div class="d-block md-d-flex flex-column">
                <!-- Revoke User Permissions Button -->
                <button type="button" class="btn btn-secondary w-100 w-md-auto mb-2 mb-md-0"
                    wire:click="revokeAllUserBasedPermissions">
                    Revoke User Permissions
                </button>
            
                <!-- Update Permissions Button -->
                <button type="submit" class="btn btn-primary w-100 w-md-auto">
                    Update Permissions
                </button>
            </div>
            </form>
        </div>
    </div>
</div>