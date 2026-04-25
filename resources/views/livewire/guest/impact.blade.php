<div>
    <!-- Breadcrumb -->
    <div class="breadcrumb-hero text-center">
        <div class="container">

            <h1 class="breadcrumb-title">Our Impact</h1>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item">
                        <a href="/">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Impact
                    </li>
                </ol>
            </nav>

        </div>
    </div>


    <!-- IMPACT STATS -->
    <section class="py-5">
        <div class="container">

            <div class="text-center mb-5">
                <h2 class="section-title">Changing Lives Through Action</h2>
                <p class="text-muted">
                    Measurable impact across agriculture, youth empowerment, and community development.
                </p>
            </div>

            <div class="row g-4 text-center">

                <div class="col-md-3 col-6">
                    <div class="impact-card">
                        <h2 class="impact-number">{{get_data_counts()['beneficiariesCount']}}+</h2>
                        <p class="impact-label">Beneficiaries Reached</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="impact-card">
                        <h2 class="impact-number">{{get_data_counts()['projectsCount']}}</h2>
                        <p class="impact-label">Projects Completed</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="impact-card">
                        <h2 class="impact-number">{{get_data_counts()['communitiesCount']}}</h2>
                        <p class="impact-label">Communities Reached</p>
                    </div>
                </div>

                <div class="col-md-3 col-6">
                    <div class="impact-card">
                        <h2 class="impact-number">{{get_data_counts()['activeDonors']}}</h2>
                        <p class="impact-label">Active Partners & Donors</p>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section class="documents-section py-5">
        <div class="container">

            <!-- Header -->
            <div class="text-center mb-5">
                <h2 class="section-title">Reports & Documents</h2>
                <p class="text-muted">
                    Access official publications, reports, and organizational documents.
                </p>
            </div>

            <div class="row g-4">

                @forelse ($documents as $doc)
                <!-- Document -->
                <div class="col-md-6 col-lg-4">
                    <div class="doc-card p-4 h-100">

                        <div class="doc-icon">
                            <i class="bi bi-journal-text"></i>
                        </div>

                        <h5 class="doc-title">{{$doc->file_name}}</h5>

                        <p class="doc-desc">
                            {{$doc->file_description}}
                        </p>

                        <a href="{{$doc->file_path}}" target="_blank" class="doc-btn">
                            View Document
                        </a>

                    </div>
                </div>
                @empty
                <!-- EMPTY STATE -->
                <div class="col-12">
                    <div class="doc-empty text-center py-5">

                        <div class="empty-icon mb-3">
                            <i class="bi bi-folder-x"></i>
                        </div>

                        <h5 class="mb-2">No Documents Available</h5>

                        <p class="text-muted mb-3">
                            There are currently no documents to display. Please check back later.
                        </p>

                        <a href="/" class="btn btn-outline-primary btn-sm">
                            Back to Home
                        </a>

                    </div>
                </div>

                @endforelse


            </div>

        </div>

        @if ($documents->hasPages())
        <div class="col-12 mt-4">
            <div class="d-flex justify-content-center">
                {{ $documents->links() }}
            </div>
        </div>
        @endif
    </section>

</div>