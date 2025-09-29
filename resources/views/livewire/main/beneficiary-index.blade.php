<div>
    <div class="">
        <nav class="mb-3" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Beneficiaries</li>
            </ol>
        </nav>
        <div class="pb-6">
            <h2 class="mb-4">25 Beneficiaries</h2>
            <div class="row g-3 justify-content-between mb-4">
                <div class="col-auto">
                    <div class="d-md-flex justify-content-between">
                        <div>
                            <button type="button" wire:click="createBeneficiary" class="btn btn-primary me-4">
                                <span class="fas fa-plus me-2"></span>
                                Add Beneficiary
                            </button>
                            <button class="btn btn-link text-body px-0" type="button" wire:click="openImportModal">
                                <span class="fa-solid fa-file-import fs-9 me-2"></span>
                                From File
                            </button>
                            <button class="btn btn-link text-body px-0" wire:click="export">
                                <span class="fa-solid fa-file-export fs-9 me-2"></span>
                                Export
                            </button>

                        </div>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="d-flex">
                        <div class="search-box me-2">
                            <form class="position-relative">
                                <input class="form-control search-input search" type="search"
                                    placeholder="Search by name" aria-label="Search">
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                        <div class="flatpickr-input-container me-2">
                            <input class="form-control ps-6 datetimepicker flatpickr-input" id="datepicker" type="text"
                                data-options='{"dateFormat":"M j, Y","disableMobile":true,"defaultDate":"Mar 1, 2022"}'
                                readonly="readonly">
                            <span class="uil uil-calendar-alt flatpickr-icon text-body-tertiary"></span>
                        </div>
                        <button class="btn px-3 btn-phoenix-secondary" type="button" data-bs-toggle="modal"
                            data-bs-target="#filterModal" data-boundary="window" aria-haspopup="true"
                            aria-expanded="false" data-bs-reference="parent">
                            <span class="fas fa-filter fs-9"></span>
                        </button>
                        <div class="modal fade" id="filterModal" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border border-translucent">
                                    <form id="addEventForm" autocomplete="off">
                                        <div class="modal-header border-translucent p-4 justify-content-between">
                                            <h5 class="modal-title text-body-highlight fs-6 lh-sm">Filter</h5>
                                            <button class="btn p-1 text-danger" type="button" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span class="fas fa-times fs-9"></span>
                                            </button>
                                        </div>
                                        <div class="modal-body pt-4 pb-2 px-4">
                                            <div class="mb-3">
                                                <label class="fw-bold mb-2 text-body-highlight" for="leadStatus">Lead
                                                    Status</label>
                                                <select class="form-select" id="leadStatus">
                                                    <option value="newLead" selected="selected">New Lead</option>
                                                    <option value="coldLead">Cold Lead</option>
                                                    <option value="wonLead">Won Lead</option>
                                                    <option value="canceled">Canceled</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="fw-bold mb-2 text-body-highlight" for="createDate">Create
                                                    Date</label>
                                                <select class="form-select" id="createDate">
                                                    <option value="today" selected="selected">Today</option>
                                                    <option value="last7Days">Last 7 Days</option>
                                                    <option value="last30Days">Last 30 Days</option>
                                                    <option value="chooseATimePeriod">Choose a time period</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="fw-bold mb-2 text-body-highlight"
                                                    for="designation">Designation</label>
                                                <select class="form-select" id="designation">
                                                    <option value="VPAccounting" selected="selected">VP Accounting
                                                    </option>
                                                    <option value="ceo">CEO</option>
                                                    <option value="creativeDirector">Creative Director</option>
                                                    <option value="accountant">Accountant</option>
                                                    <option value="executiveManager">Executive Manager</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div
                                            class="modal-footer d-flex justify-content-end align-items-center px-4 pb-4 border-0 pt-3">
                                            <button class="btn btn-sm btn-phoenix-primary px-4 fs-10 my-0"
                                                type="submit">
                                                <span class="fas fa-arrows-rotate me-2 fs-10"></span>
                                            </button>
                                            <button class="btn btn-sm btn-primary px-9 fs-10 my-0"
                                                type="submit">Done</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-body-emphasis border-y mt-2 position-relative top-1">
                <div class="table-responsive scrollbar mx-n1 px-1">
                    <table class="table fs-9 mb-0 leads-table border-top bordered">
                        <thead>
                            <tr>
                                <th class="white-space-nowrap fs-9 align-middle ps-0"
                                    style="max-width:20px; width:18px;">#</th>
                                <th class="white-space-nowrap align-middle text-uppercase ps-0" scope="col"
                                    style="width:25%;">Name</th>
                                <th class="align-middle text-uppercase border-translucent" scope="col"
                                    style="width:5%;">Age</th>
                                <th class="align-middle text-uppercase border-translucent" scope="col"
                                    style="width:15%; min-width: 180px;">Phone</th>
                                <th class="align-middle text-uppercase border-translucent" scope="col"
                                    style="width:15%;">Community</th>
                                <th class="align-middle text-uppercase border-translucent" scope="col"
                                    style="width:25%;">Project</th>
                                <th class="align-middle text-uppercase" scope="col" style="width:15%;">Created</th>
                                <th class="text-center align-middle text-uppercase" scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list" id="leal-tables-body">
                            @forelse($this->beneficiaries as $index => $beneficiary)

                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <td class="fs-9 align-middle">{{ $index + 1 }}</td>
                                <td class="name align-middle white-space-nowrap ps-0">{{$beneficiary->name}}</td>
                                <td class="email align-middle white-space-nowrap fw-semibold border-translucent">
                                    23
                                </td>
                                <td class="phone align-middle white-space-nowrap fw-semibold border-translucent">
                                    <a class="text-body-highlight"
                                        href="tel:{{$beneficiary->phone}}">{{$beneficiary->phone ?? 'unknown'}}</a>
                                </td>
                                <td
                                    class="contact align-middle white-space-nowrap border-translucent fw-semibold text-body-highlight">
                                    Ally Aagaard</td>
                                <td
                                    class="company align-middle white-space-nowrap text-body-tertiary text-opacity-85 border-translucent fw-semibold text-body-highlight">
                                    {{$beneficiary?->project->title ?? "N/A"}}</td>
                                <td
                                    class="date align-middle white-space-nowrap text-body-tertiary text-opacity-85 text-body-tertiary">
                                    {{$beneficiary->created_at->format('jS M, Y h:i A')}}</td>
                                <td class="align-middle white-space-nowrap text-end pe-0">
                                    <div class="btn-group">
                                        <button type="button" wire:click='editBeneficiary({{$beneficiary->id}})'
                                            class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-outline-danger btn-sm"
                                            wire:click='confirmDelete({{$beneficiary->id}})'>Delete</button>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-3">
                                    No Beneficiaries found.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="row align-items-center justify-content-end py-2 pe-0 fs-9">
                        @if ($this->beneficiaries->hasPages())
                        <div class="mt-3">
                            {{ $this->beneficiaries->links() }}
                        </div>
                        @else
                        <div class="mt-3 text-muted">
                            <em>No additional pages.</em>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>



        <div wire:ignore.self class="modal fade" id="beneficiaryModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <form wire:submit.prevent="createOrUpdateBeneficiary" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ $beneficiaryId ? 'Edit Beneficiary' : 'Create Beneficiary' }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Beneficiary Name -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text"
                                    class="form-control @error('name') is-invalid border-danger @enderror"
                                    wire:model="name" placeholder="Enter beneficiary name">
                                @error('name') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text"
                                    class="form-control @error('phone') is-invalid border-danger @enderror"
                                    wire:model="phone" placeholder="Enter phone number">
                                @error('phone') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Gender -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gender</label>
                                <select class="form-select @error('gender') is-invalid border-danger @enderror"
                                    wire:model="gender">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                                @error('gender') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Age -->
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Age</label>
                                <input type="number"
                                    class="form-control @error('age') is-invalid border-danger @enderror"
                                    wire:model="age" placeholder="Enter age">
                                @error('age') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Notes -->
                            <div class="mb-3">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control @error('notes') is-invalid border-danger @enderror"
                                    wire:model="notes" rows="3" placeholder="Enter any additional notes"></textarea>
                                @error('notes') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Project ID (Optional) -->
                            <div class="mb-3">
                                <label class="form-label">Project</label>
                                <select class="form-select @error('project_id') is-invalid border-danger @enderror"
                                    wire:model="project_id">
                                    <option value="">Select Project</option>
                                    <!-- Loop through available projects -->
                                    @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                                @error('project_id') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            {{ $beneficiaryId ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>



        <!-- Import Modal -->
        <div wire:ignore.self class="modal fade" id="importModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
                <form wire:submit.prevent="importBeneficiary" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            {{ __("Import Beneficiaries") }}
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Project Select -->
                            <div class="mb-2">
                                <label class="form-label">Project</label>
                                <select class="form-select @error('project_id') is-invalid border-danger @enderror"
                                    wire:model="project_id">
                                    <option value="">Select Project</option>
                                    @foreach ($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                                @error('project_id') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- File Upload -->
                            <div class="mb-2">
                                <label class="form-label">File</label>
                                <input type="file"
                                    class="form-control @error('file') is-invalid border-danger @enderror"
                                    wire:model="file" placeholder="Enter beneficiary file">
                                @error('file') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <!-- Display file loading status and total beneficiaries -->
                            @if ($loading)
                            <div class="mb-2">
                                <p><i class="fas fa-spinner fa-spin"></i> Loading...</p>
                            </div>
                            @else
                            @if ($beneficiaryCount > 0)
                            <div class="mb-2">
                                <p><strong>Total Beneficiaries in File:</strong> {{ $beneficiaryCount }}</p>
                            </div>
                            @endif
                            @endif

                            <!-- Notes -->
                            <div class="mb-2">
                                <label class="form-label">Notes</label>
                                <textarea class="form-control @error('notes') is-invalid border-danger @enderror"
                                    wire:model="notes" rows="3" placeholder="Enter any additional notes"></textarea>
                                @error('notes') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>

                            <a href="{{asset('beneficiaries-import-template.xlsx')}}"
                                download="beneficiaries-export-template">Download template</a>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            Import
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @script
    <script>
        // Listen to Livewire events and control modal
                Livewire.on('show-beneficiary-modal', () => {
                    let modal = new bootstrap.Modal(document.getElementById('beneficiaryModal'));
                    modal.show();
                });
                Livewire.on('hide-beneficiary-modal', () => {
                let modalEl = document.getElementById('beneficiaryModal');
                let modal = bootstrap.Modal.getInstance(modalEl);
                modal.hide();
                });

                Livewire.on('open-import-modal', () => {
                let modal = new bootstrap.Modal(document.getElementById('importModal'));
                modal.show();
                });
    
                Livewire.on('hide-import-modal', () => {
                    let modalEl = document.getElementById('importModal');
                    let modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();
                });
    </script>
    @endscript

</div>