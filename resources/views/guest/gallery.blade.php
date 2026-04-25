@extends('layouts.app')
@section('content')
<div class="breadcrumb-hero text-center">
    <div class="container">
        <h1 class="breadcrumb-title">Our Galleries</h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Galleries
                </li>
            </ol>
        </nav>
    </div>
</div>

<section class="section">
    <div class="container py-4">
        <div class="row g-4">
            @foreach ($mediaItems as $i => $it)
            <div class="col-sm-6 col-lg-4 col-xl-3" data-animate="animate__fadeInUp"
                data-delay="animate__delay-{{ $i }}s">
                <a class="glightbox" href="{{ asset($it->path) }}" data-gallery="divafarms-gallery" data-type="image"
                    data-title="{{ $it->project->short_description }}"
                    data-description="{{ $it->alt_text }} • {{ $it->alt_text }}">

                    <div class="gallery-card">
                        <img class="gallery-img" src="{{ asset($it->path) }}" alt="{{ $it->alt_text }}">
                        <div class="gallery-overlay"></div>

                        <div class="gallery-zoom" aria-hidden="true">
                            <i class="fa-solid fa-magnifying-glass-plus"></i>
                        </div>

                        <div class="gallery-meta">
                            <div class="d-flex align-items-center justify-content-between gap-2 mb-1">
                                <span class="badge-soft"><i class="fa-solid fa-map"></i>
                                    {{ $it->project->location }}</span>
                            </div>
                            {{-- <div class="gallery-title">{{ $it->project->title }}</div> --}}
                            <p class="gallery-sub">{{ $it->project->title }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        {{-- Load more (UI placeholder) --}}
        <div class="text-center mt-5">
            <button class="btn btn-outline-primary btn-lg px-4" type="button" data-animate="animate__fadeInBottomLeft"
                data-speed="animate__slow">
                <i class="fa-solid fa-spinner me-2"></i> Load More
            </button>
        </div>

    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
            if (!window.GLightbox) return;

            window.__divafarmsLightbox = window.__divafarmsLightbox || GLightbox({
                selector: '.glightbox',
                loop: true,
                touchNavigation: true,
                draggable: true,
                zoomable: true,
                slideEffect: 'slide',
                openEffect: 'zoom',
                closeEffect: 'zoom',
            });
        });
</script>


<!-- gallery -->
@endsection