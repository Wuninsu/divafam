@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-12">
                <h2 class="breadcrumb-title mb-2">Our Galleries</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Galleries</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->


<!-- gallery -->
<section class="about-section-two">
    <div class="container">
        <div class="row align-items-center">
            <div class="gallery-container" id="animated-thumbnails-gallery">

                @forelse ($mediaItems as $item)
                <a data-lg-size="1600-1067" data-src="{{ $item->path ?? NO_IMAGE }}"
                    data-sub-html="<h4>{{ $item->filename ?? 'unknown' }}</h4><p>From Project - {{ $item->project->title ?? 'unknown' }}</p>"
                    class="gallery-item">
                    <img src="{{ $item->path ?? NO_IMAGE }}" alt="{{ $item->alt_text }}" class="img-fluid w-100"
                        style="height: 250px; object-fit: cover;" />
                    <div class="gallery-caption">{{ $item->project->location ?? 'unknown' }}</div>
                </a>
                @empty
                <div class="col-12 text-center">
                    <div class="alert alert-warning" role="alert">
                        <strong>Note:</strong> No images available right now.
                    </div>
                </div>
                @endforelse
            </div>

            <div class="row align-items-center mt-4">
                <!-- Pagination Controls -->
                @if ($mediaItems->hasPages())
                <div class="mt-3 d-flex justify-content-center">
                    <!-- Custom Pagination Styling for Bootstrap -->
                    {{ $mediaItems->links('pagination::bootstrap-5') }}
                </div>
                @else
                <!-- If there are no more pages -->
                <div class="mt-3 text-muted text-center">
                    <em>No additional pages.</em>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- LightGallery JS -->
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/lightgallery.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/thumbnail/lg-thumbnail.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lightgallery@2.7.2/plugins/zoom/lg-zoom.umd.min.js"></script>
<script>
    // Initialize lightGallery
        lightGallery(document.getElementById('animated-thumbnails-gallery'), {
            plugins: [lgZoom, lgThumbnail],
            speed: 500,
            download: false,
        });
</script>
@endsection