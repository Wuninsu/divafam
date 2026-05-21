@extends('layouts.app')

@section('content')

<!-- HERO / BREADCRUMB -->
<div class="breadcrumb-hero text-center">
    <div class="container">

        <h1 class="breadcrumb-title">
            Partnerships & Collaboration
        </h1>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">

                <li class="breadcrumb-item">
                    <a href="/">Home</a>
                </li>

                <li class="breadcrumb-item active" aria-current="page">
                    Partners
                </li>

            </ol>
        </nav>

    </div>
</div>

<section class="partners-section py-5">

    <div class="container">

        <!-- INTRO -->
        <div class="text-center mb-5">

            <span class="page-badge">
                Collaboration • Sustainability • Community Impact
            </span>

            <h2 class="fw-bold partners-title mt-4">
                Working Together for Sustainable Impact
            </h2>

            <p class="partners-subtitle mx-auto">
                We collaborate with donors, NGOs, development agencies,
                governments, and private sector actors to deliver sustainable,
                community-centered solutions across agriculture, climate
                adaptation, livelihoods, and women’s economic inclusion.
            </p>

        </div>

        <!-- STRATEGIC ALIGNMENT -->
        <div class="mb-5">

            <div class="section-header mb-4">

                <span class="mini-badge">
                    Institutional Alignment
                </span>

                <h3 class="section-title mt-3">
                    Strategic Alignment
                </h3>

                <p class="section-description">
                    Our programs align with national, regional, and global
                    development frameworks that promote climate resilience,
                    food security, economic inclusion, and sustainable livelihoods.
                </p>

            </div>

            <div class="row g-4">

                <div class="col-md-6 col-lg-4">

                    <div class="alignment-card h-100">

                        <div class="alignment-icon">
                            <i class="fas fa-leaf"></i>
                        </div>

                        <h5>
                            Climate Policy
                        </h5>

                        <p>
                            Aligned with Ghana’s National Climate Change Policy
                            and climate adaptation priorities.
                        </p>

                    </div>

                </div>

                <div class="col-md-6 col-lg-4">

                    <div class="alignment-card h-100">

                        <div class="alignment-icon">
                            <i class="fas fa-seedling"></i>
                        </div>

                        <h5>
                            Agriculture Development
                        </h5>

                        <p>
                            Supports Food and Agriculture Sector Development
                            Policy (FASDEP III) priorities.
                        </p>

                    </div>

                </div>

                <div class="col-md-6 col-lg-4">

                    <div class="alignment-card h-100">

                        <div class="alignment-icon">
                            <i class="fas fa-earth-africa"></i>
                        </div>

                        <h5>
                            Regional Frameworks
                        </h5>

                        <p>
                            Contributes to ECOWAS agricultural priorities and
                            Climate-Smart Agriculture initiatives.
                        </p>

                    </div>

                </div>

            </div>

            <!-- SDGs -->
            <div class="sdg-wrapper mt-4">

                <div class="sdg-badge">
                    SDG 1 • No Poverty
                </div>

                <div class="sdg-badge">
                    SDG 2 • Zero Hunger
                </div>

                <div class="sdg-badge">
                    SDG 5 • Gender Equality
                </div>

                <div class="sdg-badge">
                    SDG 6 • Clean Water
                </div>

                <div class="sdg-badge">
                    SDG 8 • Decent Work
                </div>

                <div class="sdg-badge">
                    SDG 13 • Climate Action
                </div>

                <div class="sdg-badge">
                    AU Agenda 2063
                </div>

            </div>

        </div>

        <!-- CURRENT PARTNERS -->
        <div class="mb-5">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h5 class="section-label mb-1">
                        Current Partners
                    </h5>

                    <p class="small text-muted mb-0">
                        Organizations and institutions currently supporting our work.
                    </p>
                </div>

                <span class="badge partners-badge">
                    Active
                </span>

            </div>

            <div class="row g-4">

                @forelse ($activePartners as $partner)

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="partner-card active text-center">

                        <img
                            src="{{ asset($partner->logo ?? NO_IMAGE) }}"
                            class="partner-logo"
                            alt="{{ $partner->name }}"
                        >

                    </div>

                </div>

                @empty

                <div class="col-12">

                    <div class="doc-empty text-center py-5">

                        <div class="empty-icon mb-3">
                            <i class="bi bi-people"></i>
                        </div>

                        <h5 class="mb-2">
                            No Active Partners
                        </h5>

                        <p class="text-muted mb-3">
                            We currently have no active partners listed.
                        </p>

                    </div>

                </div>

                @endforelse

            </div>

        </div>

        <!-- PAST PARTNERS -->
        <div class="mb-5">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>
                    <h5 class="section-label mb-1">
                        Previous Partners
                    </h5>

                    <p class="small text-muted mb-0">
                        Organizations we have collaborated with in past initiatives.
                    </p>
                </div>

                <span class="badge partners-badge-outline">
                    Past
                </span>

            </div>

            <div class="row g-4">

                @forelse ($pastPartners as $partner)

                <div class="col-6 col-md-4 col-lg-3">

                    <div class="partner-card previous text-center">

                        <img
                            src="{{ asset($partner->logo ?? NO_IMAGE) }}"
                            class="partner-logo"
                            alt="{{ $partner->name }}"
                        >

                    </div>

                </div>

                @empty

                <div class="col-12">

                    <div class="doc-empty text-center py-5">

                        <div class="empty-icon mb-3">
                            <i class="bi bi-people"></i>
                        </div>

                        <h5 class="mb-2">
                            No Previous Partners
                        </h5>

                        <p class="text-muted mb-3">
                            We currently have no previous partners listed.
                        </p>

                    </div>

                </div>

                @endforelse

            </div>

        </div>

        <!-- PARTNERSHIP APPROACH -->
        <div class="partnership-section mt-5">

            <div class="row g-4">

                <!-- LEFT -->
                <div class="col-lg-6">

                    <div class="partner-box h-100">

                        <span class="mini-badge">
                            Collaboration Principles
                        </span>

                        <h3 class="mt-3 mb-4">
                            We Work Best With Partners Who
                        </h3>

                        <div class="partner-list">

                            <div class="partner-list-item">
                                <i class="fas fa-check-circle"></i>
                                Value field-level implementation experience and contextual knowledge
                            </div>

                            <div class="partner-list-item">
                                <i class="fas fa-check-circle"></i>
                                Expect rigorous monitoring, adaptive management, and transparent reporting
                            </div>

                            <div class="partner-list-item">
                                <i class="fas fa-check-circle"></i>
                                Support integrated and multi-sectoral programming
                            </div>

                            <div class="partner-list-item">
                                <i class="fas fa-check-circle"></i>
                                Prioritize gender equity and climate adaptation
                            </div>

                            <div class="partner-list-item">
                                <i class="fas fa-check-circle"></i>
                                Operate on realistic implementation timelines
                            </div>

                        </div>

                    </div>

                </div>

                <!-- RIGHT -->
                <div class="col-lg-6">

                    <div class="partner-box h-100">

                        <span class="mini-badge">
                            Technical Capabilities
                        </span>

                        <h3 class="mt-3 mb-4">
                            What We Offer
                        </h3>

                        <div class="partner-list">

                            <div class="partner-list-item">
                                <i class="fas fa-arrow-right"></i>
                                Co-design and piloting of innovative models
                            </div>

                            <div class="partner-list-item">
                                <i class="fas fa-arrow-right"></i>
                                Last-mile delivery for donor-funded initiatives
                            </div>

                            <div class="partner-list-item">
                                <i class="fas fa-arrow-right"></i>
                                Technical leadership in agriculture, water, and livelihoods
                            </div>

                            <div class="partner-list-item">
                                <i class="fas fa-arrow-right"></i>
                                Community engagement and government coordination
                            </div>

                            <div class="partner-list-item">
                                <i class="fas fa-arrow-right"></i>
                                M&E support and real-time data collection
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- CTA -->
        <div class="partners-cta mt-5">

            <div class="cta-inner d-lg-flex align-items-center justify-content-between text-center text-lg-start">

                <div class="cta-text">

                    <span class="mini-badge">
                        Partnership Opportunities
                    </span>

                    <h3 class="cta-title mt-3">
                        Let’s Build Sustainable Impact Together
                    </h3>

                    <p class="cta-subtitle mb-0">
                        We welcome collaboration with organizations, institutions,
                        and donors committed to climate resilience, sustainable
                        livelihoods, and inclusive development.
                    </p>

                </div>

                <div class="cta-action mt-4 mt-lg-0">

                    <a href="mailto:divafarms@divafarms.org" class="cta-btn">

                        Partner With Us

                        <span class="cta-arrow">
                            <i class="bi bi-arrow-right"></i>
                        </span>

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<style>
    /* =========================================
   PAGE BADGE
========================================= */
.page-badge{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    padding: 12px 18px;
    border-radius: 999px;
    background: var(--brand-soft);
    color: var(--brand);
    border: 1px solid var(--brand-border);
    font-size: 0.9rem;
    font-weight: 600;
    transition: all var(--transition);
}

.page-badge:hover{
    background: var(--brand-soft-2);
    transform: translateY(-2px);
}

/* =========================================
   SECTION HEADER
========================================= */
.section-title{
    color: var(--text);
    font-weight: 800;
    font-size: clamp(1.8rem, 4vw, 2.6rem);
    letter-spacing: -0.03em;
}

.section-description{
    color: var(--muted);
    line-height: 1.9;
    max-width: 760px;
}

/* =========================================
   MINI BADGE
========================================= */
.mini-badge{
    display: inline-flex;
    align-items: center;
    padding: 8px 14px;
    border-radius: 999px;
    background: var(--brand-soft);
    color: var(--brand);
    border: 1px solid var(--brand-border);
    font-size: 0.82rem;
    font-weight: 600;
}

/* =========================================
   STRATEGIC ALIGNMENT
========================================= */
.alignment-card{
    position: relative;
    overflow: hidden;
    background: var(--surface);
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 32px;
    transition: all var(--transition);
    box-shadow: var(--shadow-sm);
}

.alignment-card::before{
    content: "";
    position: absolute;
    inset: 0;
    background: linear-gradient(
        180deg,
        transparent,
        var(--brand-soft-4)
    );
    opacity: 0;
    transition: opacity var(--transition);
}

.alignment-card:hover{
    transform: translateY(-6px);
    border-color: var(--brand-border);
    box-shadow: var(--shadow-md);
}

.alignment-card:hover::before{
    opacity: 1;
}

.alignment-icon{
    width: 62px;
    height: 62px;
    border-radius: 18px;
    background: var(--brand-soft);
    border: 1px solid var(--brand-border);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--brand);
    font-size: 1.35rem;
    margin-bottom: 22px;
}

.alignment-card h5{
    color: var(--text);
    font-weight: 700;
    margin-bottom: 14px;
}

.alignment-card p{
    color: var(--muted);
    line-height: 1.8;
    margin-bottom: 0;
}

/* =========================================
   SDGs
========================================= */
.sdg-wrapper{
    display: flex;
    flex-wrap: wrap;
    gap: 14px;
}

.sdg-badge{
    padding: 12px 18px;
    border-radius: 999px;
    background: var(--surface);
    border: 1px solid var(--border);
    color: var(--text);
    font-size: 0.88rem;
    font-weight: 600;
    transition: all var(--transition);
    box-shadow: var(--shadow-sm);
}

.sdg-badge:hover{
    background: var(--brand-soft);
    border-color: var(--brand-border);
    color: var(--brand);
    transform: translateY(-2px);
}

/* =========================================
   PARTNERSHIP SECTION
========================================= */
.partnership-section{
    position: relative;
}

.partner-box{
    height: 100%;
    background: linear-gradient(
        135deg,
        var(--surface),
        var(--light-500)
    );
    border: 1px solid var(--border);
    border-radius: var(--radius-lg);
    padding: 36px;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition);
}

.partner-box:hover{
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
    border-color: var(--brand-border);
}

.partner-box h3{
    color: var(--text);
    font-weight: 800;
    letter-spacing: -0.03em;
}

.partner-list{
    display: flex;
    flex-direction: column;
    gap: 18px;
}

.partner-list-item{
    display: flex;
    align-items: flex-start;
    gap: 14px;
    color: var(--muted);
    line-height: 1.7;
    font-weight: 500;
}

.partner-list-item i{
    color: var(--brand);
    margin-top: 4px;
    font-size: 0.95rem;
}

/* =========================================
   CTA SECTION
========================================= */
.partners-cta{
    background: linear-gradient(
        135deg,
        var(--surface),
        var(--light-500)
    );
    border: 1px solid var(--border);
    border-radius: calc(var(--radius-lg) + 2px);
    padding: 48px;
    box-shadow: var(--shadow-sm);
    position: relative;
    overflow: hidden;
}

.partners-cta::before{
    content: "";
    position: absolute;
    top: -120px;
    right: -120px;
    width: 260px;
    height: 260px;
    border-radius: 50%;
    background: var(--brand-soft);
    filter: blur(12px);
}

.cta-title{
    color: var(--text);
    font-weight: 800;
    letter-spacing: -0.03em;
}

.cta-subtitle{
    color: var(--muted);
    line-height: 1.8;
    max-width: 680px;
}

.cta-btn{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    padding: 15px 26px;
    border-radius: 999px;
    background: var(--brand);
    color: var(--white);
    text-decoration: none;
    font-weight: 600;
    transition: all var(--transition);
    box-shadow: 0 12px 28px var(--brand-soft-3);
}

.cta-btn:hover{
    background: var(--brand-600);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: 0 18px 36px var(--brand-glow);
}

.cta-arrow{
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: transform var(--transition);
}

.cta-btn:hover .cta-arrow{
    transform: translateX(4px);
}

/* =========================================
   RESPONSIVE
========================================= */
@media(max-width: 991px){

    .partner-box{
        padding: 28px;
    }

    .partners-cta{
        padding: 38px;
    }

}

@media(max-width: 768px){

    .alignment-card{
        padding: 26px;
    }

    .partner-box{
        padding: 24px;
    }

    .partners-cta{
        padding: 28px 24px;
        border-radius: var(--radius-lg);
    }

    .sdg-wrapper{
        gap: 10px;
    }

    .sdg-badge{
        font-size: 0.8rem;
        padding: 10px 14px;
    }

}

@media(max-width: 576px){

    .alignment-card,
    .partner-box{
        border-radius: var(--radius);
    }

    .cta-btn{
        width: 100%;
    }

}
</style>
@endsection