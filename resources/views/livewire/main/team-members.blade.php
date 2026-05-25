<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="breadcrumb-item active">Team Members</li>
        </ol>
    </nav>

    <div class="py-4">

        <!-- Header -->
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">

            <!-- Title Section -->
            <div>
                <h3 class="fw-bold mb-1">Team Management</h3>
                <p class="text-muted mb-0">Manage team and advisory board members</p>
            </div>

            <!-- Search Box -->
            <div class="flex-grow-1">
                <input type="text" wire:model.live.debounce.500ms="search" class="form-control shadow-sm w-100"
                    placeholder="Search team members...">
            </div>

        </div>

        <!-- Team Grid -->
        <div class="row g-4">

            @foreach($this->users as $user)

            <div class="col-sm-6 col-md-4">

                <div class="card border shadow-sm rounded-4 h-100 user-card">

                    <!-- Image -->
                    <div class="position-relative">

                        <img src="{{ $user->avatar_url ?? NO_IMAGE }}" class="card-img-top rounded-top-4"
                            alt="{{ $user->name }}" style="height: 240px; object-fit: cover;">

                        <!-- Role Badge -->
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-dark-subtle text-dark px-3 py-2 rounded-pill">
                                {{ $user->getRoleNames()->join(', ') }}
                            </span>
                        </div>

                    </div>

                    <!-- Card Body -->
                    <div class="card-body d-flex flex-column">

                        <div class="text-center mb-3">
                            <h5 class="fw-bold mb-1">
                                {{ $user->name }}
                            </h5>

                            <small class="text-muted">
                                Team Member Profile
                            </small>
                        </div>

                        <!-- Switches -->
                        <div class="mt-auto">

                            <!-- Team Member -->
                            <div class="d-flex justify-content-between align-items-center bg-light rounded-3 p-3 mb-3">

                                <div>
                                    <div class="fw-semibold">
                                        Team Member
                                    </div>

                                    <small class="text-muted">
                                        Enable team access
                                    </small>
                                </div>

                                <div class="form-check form-switch m-0">

                                    <input class="form-check-input fs-5" type="checkbox"
                                        id="is_team_member_{{ $user->id }}" @checked($user->is_team_member)
                                    wire:click="toggleTeamMember({{ $user->id }})"
                                    >

                                </div>

                            </div>

                            <!-- Advisory Board -->
                            <div class="d-flex justify-content-between align-items-center bg-light rounded-3 p-3">

                                <div>
                                    <div class="fw-semibold">
                                        Advisory Board
                                    </div>

                                    <small class="text-muted">
                                        Strategic board member
                                    </small>
                                </div>

                                <div class="form-check form-switch m-0">

                                    <input class="form-check-input fs-5" type="checkbox"
                                        id="is_advisory_board_member_{{ $user->id }}"
                                        @checked($user->is_advisory_board_member)
                                    wire:click="toggleAdvisoryBoardMember({{ $user->id }})"
                                    >

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            @endforeach

        </div>
        <div class="row align-items-center justify-content-between py-2 pe-0 fs-9">
            @if ($users->hasPages())
            {{ $users->links() }}
            @endif
        </div>
        <style>
            .user-card {
                transition: all 0.3s ease;
                overflow: hidden;
            }

            .user-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 1rem 3rem rgba(0, 0, 0, .12) !important;
            }

            .form-check-input {
                cursor: pointer;
            }

            .card-img-top {
                transition: transform 0.4s ease;
            }

            .user-card:hover .card-img-top {
                transform: scale(1.03);
            }
        </style>

    </div>
</div>