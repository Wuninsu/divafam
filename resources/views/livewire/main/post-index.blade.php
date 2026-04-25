<div>
    <nav class="mb-3" aria-label="breadcrumb">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Post</li>
        </ol>
    </nav>
    <div class="mb-9">
        <div id="projectSummary"
            data-list="{&quot;valueNames&quot;:[&quot;projectName&quot;,&quot;assignees&quot;,&quot;start&quot;,&quot;deadline&quot;,&quot;task&quot;,&quot;projectprogress&quot;,&quot;status&quot;,&quot;action&quot;],&quot;page&quot;:6,&quot;pagination&quot;:true}">
            <div class="row mb-4 gx-6 gy-3 align-items-center">
                <div class="col-auto">
                    <h2 class="mb-0">Posts<span class="fw-normal text-body-tertiary ms-3">({{
                            array_sum($statusCounts) }})</span></h2>
                </div>
                <div class="col-auto">
                    <a class="btn btn-primary px-5" href="{{ route('posts.create') }}">
                        <i class="fa-solid fa-plus me-2"></i>Add new Post</a>
                    <a class="btn btn-dark px-5" href="{{ route('posts.new') }}">
                        <i class="fa-solid fa-plus me-2"></i>New Post</a>
                </div>
            </div>
            <div class="row g-3 justify-content-between align-items-end mb-4">
                <div class="col-12 col-sm-auto">
                    <ul class="nav nav-links mx-n2 project-tab">
                        {{-- All --}}
                        <li class="nav-item">
                            <a wire:click.prevent="$set('status', '')"
                                class="nav-link px-2 py-1 {{ $status === '' ? 'active' : '' }}" href="#">
                                <span>All</span>
                                <span class="text-body-tertiary fw-semibold">
                                    ({{ array_sum($statusCounts) }})
                                </span>
                            </a>
                        </li>

                        {{-- Loop through statuses --}}
                        @foreach ([ 'draft' => 'Draft', 'published' => 'Published', 'archived' =>
                        'Archived'] as $key => $label)
                        <li class="nav-item">
                            <a wire:click.prevent="$set('status', '{{ $key }}')"
                                class="nav-link px-2 py-1 {{ $status === $key ? 'active' : '' }}" href="#">
                                <span>{{ $label }}</span>
                                <span class="text-body-tertiary fw-semibold">
                                    ({{ $statusCounts[$key] ?? 0 }})
                                </span>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-sm-auto">
                    <div class="d-flex align-items-center">
                        <div class="search-box me-3">
                            <form class="position-relative"><input class="form-control search-input search"
                                    wire:model.live.debounce.1000ms="search" placeholder="Search projects"
                                    aria-label="Search">
                                <span class="fas fa-search search-box-icon"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive scrollbar">
                <table class="table fs-9 mb-0 border-top border-translucent">
                    <thead>
                        <tr>
                            <th class="sort white-space-nowrap align-middle ps-0" scope="col" style="width:25%;">PROJECT
                                NAME</th>
                            <th class="sort align-middle ps-3" scope="col" style="width:15%;">CATEGORY</th>
                            <th class="sort align-middle ps-3" scope="col" style="width:12%;">AUTHOR</th>
                            <th class="sort align-middle ps-3" scope="col" style="width:15%;">FEATURED</th>
                            <th class="sort align-middle ps-3" scope="col" style="width:15%;">APPROVED</th>
                            <th class="sort align-middle text-center" scope="col" style="width:10%;">
                                STATUS</th>
                            <th class="sort align-middle text-center" scope="col" style="width:10%;">ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                        <tr>
                            <td class="align-middle ps-0">{{$post->title}}</td>
                            <td class="align-middle ps-3">{{$post?->category->name}}</td>
                            <td class="align-middle ps-3">
                                {{$post->author->name}}
                            </td>
                            <td class="align-middle ps-3"><span
                                    class="badge bg-{{ $post->is_featured ? 'success' : 'secondary' }}">
                                    {{ $post->is_featured ? 'Yes' : 'No' }}
                                </span></td>
                            <td class="align-middle ps-3"><span
                                    class="badge bg-{{ $post->is_approved ? 'success' : 'secondary' }}">
                                    {{ $post->is_approved ? 'Yes' : 'No' }}
                                </span></td>
                            <td class="align-middle text-center">
                                @php
                                $badgeClass = match ($post->status) {
                                'ongoing' => 'warning',
                                'completed' => 'success',
                                'draft' => 'secondary',
                                'archived' => 'dark',
                                'postponed' => 'danger',
                                default => 'primary',
                                };
                                @endphp
                                <span class="badge badge-phoenix badge-phoenix-{{ $badgeClass }} text-capitalized">
                                    {{ ucfirst($post->status) }}
                                </span>
                            </td>
                            <td class="align-middle text-center">
                                <div class="btn-group">
                                    <a class="btn btn-outline-primary btn-sm"
                                        href="{{route('posts.show',['post'=>$post->uuid])}}">Show</a>
                                    <a class="btn btn-primary btn-sm"
                                        href="{{route('posts.edit',['post'=>$post->uuid])}}">Edit</a>
                                    <button type="button" wire:click='deletePost({{$post->id}})'
                                        class="btn btn-danger btn-sm">Delete</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-3">No posts available.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($posts->hasPages())
            <div class="mt-3">
                {{ $posts->links() }}
            </div>
            @else
            <div class="mt-3 text-muted">
                <em>No additional pages.</em>
            </div>
            @endif
        </div>
    </div>
</div>