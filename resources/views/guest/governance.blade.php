@extends('layouts.app')

@section('content')

<div class="breadcrumb-hero text-center">
    <div class="container">

        <h1 class="breadcrumb-title">
            Governance & Compliance
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">

                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    Governance
                </li>

            </ol>
        </nav>

    </div>
</div>

<div class="container py-5">

    <!-- HERO -->
    <div class="text-center mb-5">

        <span class="page-badge">
            Accountability • Transparency • Compliance
        </span>

        <h2 class="section-title mt-4">
            Building Trust Through Strong Governance
        </h2>

        <p class="section-description mx-auto">
            DivaFam is committed to transparent governance, responsible financial
            management, safeguarding, and institutional accountability across all
            programs and partnerships.
        </p>

    </div>

    <!-- GOVERNANCE GRID -->
    <div class="row g-4">

        <div class="col-md-6 col-lg-4">

            <div class="governance-card h-100">

                <div class="governance-icon">
                    <i class="fas fa-scale-balanced"></i>
                </div>

                <h4>
                    Legal Registration
                </h4>

                <p>
                    DivaFam is registered as a non-governmental organization under
                    Ghana’s NGO regulatory framework and operates in compliance
                    with national legal requirements.
                </p>

                <div class="mt-4">

                    <a href="{{asset(setup_data('legal_registration_document'))}}"
                        target="_blank" class="document-btn">
                        <i class="fas fa-file-pdf me-2"></i>
                        View Certificate
                    </a>

                </div>
            </div>

        </div>

        <div class="col-md-6 col-lg-4">

            <div class="governance-card h-100">

                <div class="governance-icon">
                    <i class="fas fa-chart-line"></i>
                </div>

                <h4>
                    Financial Accountability
                </h4>

                <p>
                    We maintain annual financial audits conducted by certified
                    external auditors and uphold strict internal financial
                    management and reporting systems.
                </p>

            </div>

        </div>

        <div class="col-md-6 col-lg-4">

            <div class="governance-card h-100">

                <div class="governance-icon">
                    <i class="fas fa-shield-heart"></i>
                </div>

                <h4>
                    Safeguarding
                </h4>

                <p>
                    Our safeguarding systems align with international best
                    practices and Core Humanitarian Standards to ensure the
                    protection and dignity of all beneficiaries.
                </p>

            </div>

        </div>

        <div class="col-md-6 col-lg-4">

            <div class="governance-card h-100">

                <div class="governance-icon">
                    <i class="fas fa-people-group"></i>
                </div>

                <h4>
                    Gender & Social Inclusion
                </h4>

                <p>
                    We integrate Gender and Social Inclusion (GESI) principles
                    across all programs to promote equitable participation,
                    leadership, and access to opportunities.
                </p>

            </div>

        </div>

        <div class="col-md-6 col-lg-4">

            <div class="governance-card h-100">

                <div class="governance-icon">
                    <i class="fas fa-leaf"></i>
                </div>

                <h4>
                    Environmental & Social Standards
                </h4>

                <p>
                    DivaFam applies Environmental and Social Management Systems
                    (ESMS) to infrastructure and field-based interventions to
                    support sustainable implementation.
                </p>

            </div>

        </div>

        <div class="col-md-6 col-lg-4">

            <div class="governance-card h-100">

                <div class="governance-icon">
                    <i class="fas fa-lock"></i>
                </div>

                <h4>
                    Data Protection & Ethics
                </h4>

                <p>
                    We maintain data protection protocols, anti-fraud systems,
                    ethical reporting standards, and compliance procedures to
                    ensure transparency and institutional integrity.
                </p>

            </div>

        </div>

    </div>

    <!-- DONOR COMPLIANCE -->
    <div class="compliance-section mt-5">

        <div class="row align-items-center">

            <div class="col-lg-7">

                <span class="mini-badge">
                    Institutional Readiness
                </span>

                <h3 class="mt-3 mb-3">
                    Donor Compliance & Reporting
                </h3>

                <p class="text-muted">
                    DivaFam has experience supporting donor-funded programs and
                    maintains systems designed to meet reporting, compliance,
                    monitoring, and accountability requirements for institutional
                    partners including NGOs, foundations, development agencies,
                    and public sector initiatives.
                </p>

                <div class="compliance-list mt-4">

                    <div class="compliance-item">
                        <i class="fas fa-check-circle"></i>
                        Transparent financial reporting
                    </div>

                    <div class="compliance-item">
                        <i class="fas fa-check-circle"></i>
                        Monitoring & evaluation systems
                    </div>

                    <div class="compliance-item">
                        <i class="fas fa-check-circle"></i>
                        Results-based implementation
                    </div>

                    <div class="compliance-item">
                        <i class="fas fa-check-circle"></i>
                        Community accountability mechanisms
                    </div>

                </div>

            </div>

            <div class="col-lg-5 mt-4 mt-lg-0">

                <div class="compliance-box">

                    <h5 class="mb-3">
                        Governance Areas
                    </h5>

                    <ul class="governance-list">

                        <li>Annual External Audits</li>
                        <li>Safeguarding Policies</li>
                        <li>Anti-Fraud & Corruption</li>
                        <li>Gender Inclusion Frameworks</li>
                        <li>Environmental Safeguards</li>
                        <li>Data Protection Protocols</li>
                        <li>Donor Compliance Systems</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

    <!-- CTA -->
    <div class="governance-cta text-center mt-5">

        <h3>
            Partner With DivaFam
        </h3>

        <p class="text-muted mx-auto">
            We welcome partnerships with organizations, institutions, and donors
            seeking transparent, accountable, and community-driven implementation
            partners.
        </p>

        <a href="mailto:divafarms@divafarms.org" class="btn btn-success px-4 py-3 mt-3">
            Contact Our Team
        </a>

    </div>

</div>

<style>
    .document-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 18px;
        border-radius: 999px;
        background: var(--brand-soft);
        color: var(--brand);
        border: 1px solid var(--brand-border);
        font-size: 0.9rem;
        font-weight: 600;
        text-decoration: none;
        transition: all var(--transition);
    }

    .document-btn:hover {
        background: var(--brand);
        color: var(--white);
        border-color: var(--brand);
        transform: translateY(-2px);
    }

    .page-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 18px;
        border-radius: 999px;
        background: var(--brand-soft);
        color: var(--brand);
        border: 1px solid var(--brand-border);
        font-weight: 600;
        font-size: 0.9rem;
    }

    .section-title {
        font-weight: 800;
        font-size: clamp(2rem, 4vw, 3.2rem);
        color: var(--text);
        letter-spacing: -0.04em;
    }

    .section-description {
        max-width: 760px;
        color: var(--muted);
        line-height: 1.9;
        font-size: 1.05rem;
    }

    /* CARDS */
    .governance-card {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 32px;
        transition: all var(--transition);
        box-shadow: var(--shadow-sm);
        position: relative;
        overflow: hidden;
    }

   
    .governance-card:hover {
        transform: translateY(-6px);
        border-color: var(--brand-border);
        box-shadow: var(--shadow-md);
    }

    .governance-card:hover::before {
        opacity: 1;
    }

    .governance-icon {
        width: 64px;
        height: 64px;
        border-radius: 18px;
        background: var(--brand-soft);
        color: var(--brand);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 22px;
        font-size: 1.4rem;
        border: 1px solid var(--brand-border);
    }

    .governance-card h4 {
        color: var(--text);
        font-weight: 700;
        margin-bottom: 14px;
    }

    .governance-card p {
        color: var(--muted);
        line-height: 1.8;
        margin-bottom: 0;
    }

    /* COMPLIANCE */
    .compliance-section {
        background: linear-gradient(135deg,
                var(--surface),
                var(--light-500));
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 50px;
        box-shadow: var(--shadow-sm);
    }

    .mini-badge {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 999px;
        background: var(--brand-soft);
        color: var(--brand);
        font-weight: 600;
        font-size: 0.82rem;
        border: 1px solid var(--brand-border);
    }

    .compliance-section h3 {
        color: var(--text);
        font-weight: 800;
        letter-spacing: -0.03em;
    }

    .compliance-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .compliance-item {
        display: flex;
        align-items: center;
        gap: 12px;
        color: var(--text);
        font-weight: 500;
    }

    .compliance-item i {
        color: var(--brand);
    }

    .compliance-box {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 28px;
        box-shadow: var(--shadow-sm);
    }

    .compliance-box h5 {
        color: var(--text);
        font-weight: 700;
    }

    .governance-list {
        margin: 0;
        padding-left: 18px;
    }

    .governance-list li {
        margin-bottom: 12px;
        color: var(--muted);
    }

    /* CTA */
    .governance-cta {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 60px 30px;
        box-shadow: var(--shadow-sm);
    }

    .governance-cta h3 {
        font-weight: 800;
        color: var(--text);
        letter-spacing: -0.03em;
    }

    .governance-cta p {
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.9;
    }

    .btn-success {
        background: var(--brand) !important;
        border-color: var(--brand) !important;
        border-radius: 999px;
        font-weight: 600;
        box-shadow: 0 10px 24px var(--brand-soft-3);
        transition: all var(--transition);
    }

    .btn-success:hover {
        background: var(--brand-600) !important;
        border-color: var(--brand-600) !important;
        transform: translateY(-2px);
        box-shadow: 0 16px 32px var(--brand-glow);
    }

    /* RESPONSIVE */
    @media(max-width: 991px) {

        .compliance-section {
            padding: 36px;
        }

    }

    @media(max-width: 768px) {

        .governance-card {
            padding: 26px;
        }

        .compliance-section {
            padding: 24px;
        }

        .governance-cta {
            padding: 40px 24px;
        }

        .section-title {
            font-size: 2.2rem;
        }

    }
</style>

@endsection