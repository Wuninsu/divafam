<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
            <li class="breadcrumb-item active">Team Members</li>
        </ol>
    </nav>

    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
        <div class="row mx-2 mx-md-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Team</h5>
                <small class="text-muted">Team Members</small>
            </div>

            <div class="row mb-3">
                <div class="col-md-9 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control form-control-sm"
                        placeholder="Search...">
                </div>
            </div>

            {{-- List all team members --}}
            <div class="row">
                @foreach($this->users as $user)
                <div class="col-md-3 mb-4">
                    <div class="card" style="max-width: 20rem;">
                        <!-- Adjust image with object-fit for consistency -->
                        <img class="card-img-top" src="{{ $user->avatar_url ?? NO_IMAGE }}" alt="..."
                            style="height: 200px; object-fit: cover; width: 100%;">

                        <div class="card-body">
                            <h5 class="card-title">{{ $user->name }}</h5>
                            <p class="card-text">
                                Role: {{ $user->getRoleNames()->join(', ') }}<br>

                            <div class="form-check form-switch">
                                <label class="form-check-label" for="is_team_member_{{ $user->id }}">
                                    Is Team Member:
                                    <input class="form-check-input" type="checkbox" id="is_team_member_{{ $user->id }}"
                                        @if($user->is_team_member) checked @endif
                                    wire:click="toggleTeamMember({{ $user->id }})" />
                                </label>
                            </div>
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>