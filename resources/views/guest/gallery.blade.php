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
    <section class="about-section-two pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="gallery-container" id="animated-thumbnails-gallery">
                    <a data-lg-size="1600-1067"
                        data-src="https://images.unsplash.com/photo-1609342122563-a43ac8917a3a?auto=format&fit=crop&w=1600&q=80"
                        data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@tobbes_rd'>Tobias Rademacher</a></h4><p>Location - Südtirol, Italien</p>"
                        class="gallery-item">
                        <img src="https://images.unsplash.com/photo-1609342122563-a43ac8917a3a?auto=format&fit=crop&w=240&q=80"
                            alt="layers of blue." class="img-fluid rounded shadow" />
                        <div class="gallery-caption">Südtirol, Italien</div>
                    </a>
                    <a data-lg-size="1600-1067" class="gallery-item"
                        data-src="https://images.unsplash.com/photo-1609342122563-a43ac8917a3a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1600&q=80"
                        data-sub-html="<h4>Photo by - <a href='https://unsplash.com/@tobbes_rd' >Tobias Rademacher </a></h4><p> Location - <a href='https://unsplash.com/s/photos/puezgruppe%2C-wolkenstein-in-gr%C3%B6den%2C-s%C3%BCdtirol%2C-italien'>Puezgruppe, Wolkenstein in Gröden, Südtirol, Italien</a>layers of blue.</p>">
                        <img alt="layers of blue." class="img-responsive"
                            src="https://images.unsplash.com/photo-1609342122563-a43ac8917a3a?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=240&q=80" />
                        <div class="gallery-caption">Tobias Rademacher</div>
                    </a>
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
