<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Pages</li>
        </ol>
    </nav>
    <div class="mx-n4 mx-lg-n6 px-0 py-3 mb-9 bg-body-emphasis border-y position-relative top-1">
        <!-- Permission Table -->
        <div class="row mx-2 mx-md-0">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Pages</h5>
                <small class="text-muted">Manage pages.</small>
            </div>
            <div class="row mb-3">
                <div class="col-md-9 mb-2 mb-md-0">
                    <input type="text" wire:model.live.debounce.1000ms="search" class="form-control form-control-sm"
                        placeholder="Search page...">
                </div>
                <div class="col-md-3">
                    <a class="btn add-new btn-primary" href="{{route('pages.create')}}">
                        <i class="fa fa-plus"></i>
                        Add Page
                    </a>
                </div>
            </div>
            <div class="table-responsive scrollbar ms-n1">
                <table class="table table-sm fs-9 mb-0">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>TITLE</th>
                            <th>TYPE</th>
                            <th>STATUS</th>
                            <th scope="col" style="width:19%; min-width:200px;">CREATED</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->pages as $index => $page)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td><span class="text-nowrap text-heading">{{ ucfirst($page->title) }}</span>
                            </td>
                            <td><span class="text-nowrap text-heading">{{ ucfirst($page->type) }}</span>
                            </td>
                            <td>
                                <span class="badge bg-{{ $page->is_active ? 'success' : 'secondary' }}">
                                    {{ $page->is_active ? 'Visible' : 'Hidden' }}
                                </span>
                            </td>
                            <td>{{ $page->created_at->format('d M Y, h:i A') }}</td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-sm btn-outline-primary"
                                        href="{{route('pages.edit',['page'=>$page->id])}}">Edit</a>
                                    <button class="btn btn-sm btn-outline-danger"
                                        wire:click='confirmDelete({{ $page->id }})'>Delete</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">
                                No pages found.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    <tfoot></tfoot>
                </table>
                @if ($this->pages->hasPages())
                <div class="mt-3">
                    {{ $this->pages->links() }}
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