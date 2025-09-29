<div>
    <div class="">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
        <h2 class="text-bold text-body-emphasis mb-5">Users</h2>
        <div id="members">
            <div class="row mb-3">
                <div class="col-md-6 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control"
                        placeholder="Search users by name, ID, email...">
                </div>
                <div class="col-md-3 mb-2 mb-sm-0">
                    <select class="form-select" wire:model.change="role">
                        <option value="">All Roles</option>
                        @foreach ($roles as $item)
                        <option value="{{ $item->name }}">{{ ucfirst($item->name) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-auto">
                    <div class="d-flex align-items-center">
                        <button class="btn btn-link text-body me-4 px-0">
                            <span class="fa-solid fa-file-export fs-9 me-2"></span> Export
                        </button>
                        <a href="{{route('users.create')}}" class="btn btn-primary">
                            <span class="fas fa-plus me-2"></span>
                            Add user
                        </a>
                    </div>
                </div>
            </div>
            <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
                <div class="table-responsive scrollbar ms-n1 ps-1">
                    <table class="table table-sm fs-9 mb-0">
                        <thead>
                            <tr>
                                <th class="white-space-nowrap fs-9 align-middle ps-0">#</th>
                                <th class="align-middle" scope="col" style="width:15%; min-width:200px;">USER</th>
                                <th class="align-middle" scope="col" style="width:15%; min-width:200px;">EMAIL</th>
                                <th class="align-middle pe-3" scope="col" style="width:20%; min-width:200px;">MOBILE
                                    NUMBER</th>
                                <th class="align-middle" scope="col" style="width:10%;">ROLE</th>
                                <th class="align-middle text-end pe-0" scope="col" style="width:19%; min-width:200px;">
                                    JOINED</th>
                                <th class="align-middle text-end" scope="col" style="width:21%; min-width:200px;">ACTION
                                </th>
                            </tr>
                        </thead>
                        <tbody class="list" id="members-table-body">
                            @forelse ($users as $user)
                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs-9 align-middle ps-0 py-3">
                                    {{ $users->firstItem() + $loop->index }}
                                </td>
                                <td class="customer align-middle white-space-nowrap">
                                    <a class="d-flex align-items-center text-body text-hover-1000" href="#!">
                                        <div class="avatar avatar-m">
                                            <img class="rounded-circle" src="{{ asset($user->avatar_url ?? NO_IMAGE) }}"
                                                alt="">
                                        </div>
                                        <h6 class="mb-0 ms-3 fw-semibold">{{ $user->name }}</h6>
                                    </a>
                                </td>
                                <td class="email align-middle white-space-nowrap">
                                    <a class="fw-semibold" href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </td>
                                <td class="mobile_number align-middle white-space-nowrap">
                                    <a class="fw-bold text-body-emphasis" href="tel:{{ $user->phone }}">{{ $user->phone
                                        }}</a>
                                </td>
                                <td class="role align-middle white-space-nowrap">
                                    @foreach ($user->getRoleNames() as $role)
                                    @php
                                    $badgeClass = match ($role) {
                                    'dev' => 'danger',
                                    'admin' => 'danger',
                                    'editor' => 'success',
                                    'director' => 'primary',
                                    'secretary' => 'dark',
                                    default => 'secondary',
                                    };
                                    @endphp
                                    <span class="badge badge-phoenix badge-phoenix-{{ $badgeClass }} text-capitalized">
                                        {{ ucfirst($role) }}
                                    </span>
                                    @endforeach
                                </td>
                                <td class="created-at align-middle white-space-nowrap text-body-tertiary text-end">
                                    {{ $user->created_at->format('M d, h:i A') }}
                                </td>
                                <td class="last_active align-middle text-end white-space-nowrap text-body-tertiary">
                                    <div class="d-flex justify-content-end">
                                        @can('assign permission')
                                        <a href="{{ route('users.manage-user-permission', ['user' => $user->uuid]) }}"
                                            class="btn btn-warning btn-sm me-2" data-bs-toggle="tooltip"
                                            data-bs-placement="top" aria-label="Permission"
                                            data-bs-original-title="Permissions">
                                            <i class="fa fa-key"></i>
                                        </a>
                                        @endcan
                                        <a href="{{ route('users.edit', ['user' => $user->uuid]) }}"
                                            class="btn btn-primary btn-sm me-2" data-bs-toggle="tooltip"
                                            data-bs-placement="top" aria-label="Edit" data-bs-original-title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            @if($user->hasRole('super-admin') ||
                                            $user->hasRole('admin'))
                                            disabled
                                            @endif
                                            wire:click="deleteUser('{{ $user->uuid }}')"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            aria-label="Delete"
                                            data-bs-original-title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center py-3">No users found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
                    @if ($users->hasPages())
                    {{ $users->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>