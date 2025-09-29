<div>
    <div>
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Recycle Bin</li>
            </ol>
        </nav>
        <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
            <!-- Permission Table -->
            <div class="row mx-2 mx-md-0">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0">Recycle Bin</h5>
                    <small class="text-muted">Manage and deleted data</small>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-2 mb-md-0">
                        <input type="text" wire:model.live.debounce.1000ms="search" class="form-control form-control-sm"
                            placeholder="Search by key...">
                    </div>
                    <div class="col-md-3 mb-2 mb-md-0">
                        <select wire:model.live="filterType" class="form-select">
                            <option value="all">All</option>
                            <option value="user">Users</option>
                            <option value="post">Posts</option>
                            <option value="page">Pages</option>
                            <option value="event">Events</option>
                            <option value="project">Projects</option>
                            <option value="training">Trainings</option>

                        </select>
                    </div>
                </div>
                <div class="table-responsive scrollbar ms-n1">
                    <table class="table table-sm fs-9 mb-0">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>TYPE</th>
                                <th>INFO</th>
                                <th>DELETED</th>
                                <th class="text-center">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($this->records as $row)
                            <tr>
                                <td class="fw-semibold">{{ $row['id'] }}</td>
                                <td>
                                    <span
                                        class="badge bg-{{ $row['type'] === 'order' ? 'primary' : ($row['type'] === 'errand' ? 'warning' : 'info') }}">
                                        {{ ucfirst($row['type']) }}
                                    </span>
                                </td>
                                <td>{{ $row['info'] }}</td>

                                {{-- <td>
                                    @if ($row['amount'])
                                    ₵{{ number_format($row['amount'], 2) }}
                                    @else
                                    —
                                    @endif
                                </td> --}}

                                <td><small class="text-muted">{{ $row['deleted_at']->diffForHumans() }}</small></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <button class="btn btn-sm btn-outline-success"
                                            wire:click.prevent="restore('{{ $row['type'] }}', {{ $row['id'] }})">Restore</button>
                                        <button class="btn btn-sm btn-outline-danger"
                                            wire:click.prevent="forceDelete('{{ $row['type'] }}', {{ $row['id'] }})">Delete</button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    <em>No deleted records found.</em>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>




        </div>

    </div>
</div>