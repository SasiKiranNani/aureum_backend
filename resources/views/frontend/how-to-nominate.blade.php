@extends('layouts.frontend.index')

@section('contents')
    <!-- V7 Crystal Design for How to Nominate -->
    <section class="nominate-process-section position-relative overflow-hidden pt-5 pb-5 bg-dark">
        <!-- Background Elements -->
        <div class="background-canvas">
            <div class="void-bg"></div>
            <div class="grid-floor"></div>
            <div class="stars-twinkle"></div>
        </div>

        <div class="container position-relative z-2">
            <!-- Header -->
            <div class="text-center mb-5 scroll-reveal pt-5">
                <div class="badge-pill mb-3 d-inline-block">
                    <span class="text-gold fw-bold text-uppercase tracking-wider fs-xs">
                        <i class="fas fa-edit me-2"></i>Nomination Process
                    </span>
                </div>
                <h1 class="hero-title fw-900 text-white mb-4" style="font-size: clamp(2rem, 5vw, 4rem);">How to <span
                        class="text-gold-liquid">Nominate</span></h1>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="glass-panel p-4 p-md-5 rounded-4 border-gold-subtle text-start text-md-center">
                            <h3 class="text-white h4 mb-3">Introduction</h3>
                            <p class="text-white-80 leading-relaxed">
                                Nominate candidates for an international recognition honoring excellence in fields like
                                innovation, leadership, sustainability, and technology. This program adheres to global best
                                practices for merit-based awards, emphasizing transparent, evidence-driven evaluation by an
                                independent international jury.
                            </p>
                            <p class="text-white-80 leading-relaxed mb-0">
                                Nominations undergo a rigorous, impartial review focused solely on demonstrated achievement,
                                impact, and alignment with the award's published criteria. The process is designed to uphold
                                the highest standards of fairness, objectivity, and global credibility.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Eligibility -->
            <div class="row justify-content-center mb-5 scroll-reveal">
                <div class="col-lg-10">
                    <div class="prism-card p-4 p-md-5 position-relative overflow-hidden rounded-4"
                        style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05);">
                        <div class="corner-accent top-left"
                            style="position: absolute; top:0; left:0; width: 40px; height: 40px; border-top: 2px solid #FFD700; border-left: 2px solid #FFD700;">
                        </div>
                        <div class="corner-accent bottom-right"
                            style="position: absolute; bottom:0; right:0; width: 40px; height: 40px; border-bottom: 2px solid #FFD700; border-right: 2px solid #FFD700;">
                        </div>
                        <h3 class="text-white h3 mb-4"><i class="fas fa-check-circle text-gold me-2"></i>Eligibility and
                            Categories</h3>
                        <p class="text-white-70 mb-4">Before nominating, review the detailed eligibility requirements and
                            award categories ["Award Categories & Criteria" page]. Typical international-standard
                            requirements include:</p>
                        <ul class="list-unstyled text-white-80">
                            <li class="mb-3 d-flex" style="text-wrap: auto;"><i
                                    class="fas fa-angle-right text-gold mt-1 me-3"></i>
                                <div>Nominees must demonstrate exceptional, verifiable contributions within the relevant
                                    timeframe (e.g., recent 3–10 years, depending on category).</div>
                            </li>
                            <li class="mb-3 d-flex" style="text-wrap: auto;"><i
                                    class="fas fa-angle-right text-gold mt-1 me-3"></i>
                                <div>Achievements should show measurable impact on individuals, organizations, industries,
                                    or society (quantitative metrics preferred where applicable).</div>
                            </li>
                            <li class="d-flex" style="text-wrap: auto;"><i
                                    class="fas fa-angle-right text-gold mt-1 me-3"></i>
                                <div>Nominees should exemplify [core values, e.g., integrity, innovation, global benefit,
                                    ethical leadership].</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Steps (Cinematic List Layout) -->
            <div class="mb-5 pb-5">
                <h2 class="text-center text-white mb-5 display-5 fw-bold">Step-by-Step Nomination Process</h2>
                <div class="process-container">
                    <!-- Step 1 -->
                    <div class="process-row scroll-reveal">
                        <div class="process-visual">
                            <div class="process-number">01</div>
                            <div class="process-icon-box">
                                <i class="fas fa-check-circle"></i>
                            </div>
                        </div>
                        <div class="process-content">
                            <h4 class="text-white mb-3 h3 fw-bold">Confirm Eligibility and Select Category</h4>
                            <p class="text-white-70 leading-relaxed mb-0">Carefully match the nominee to one award category
                                to ensure strong alignment. Nominations misaligned with criteria are likely to disqualify.
                            </p>
                        </div>
                    </div>

                    <!-- Step 2 -->
                    <div class="process-row scroll-reveal delay-1">
                        <div class="process-visual">
                            <div class="process-number">02</div>
                            <div class="process-icon-box">
                                <i class="fas fa-file-alt"></i>
                            </div>
                        </div>
                        <div class="process-content">
                            <h4 class="text-white mb-3 h3 fw-bold">Prepare a Robust, Evidence-Based Nomination</h4>
                            <p class="text-white-70 mb-3">Gather comprehensive supporting materials. Best practices require:
                            </p>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <ul class="process-list">
                                        <li><i class="fas fa-angle-right text-gold"></i> Detailed description of
                                            achievements using specific examples (Situation–Task–Action–Result framework
                                            recommended).</li>
                                        <li><i class="fas fa-angle-right text-gold"></i>Quantifiable outcomes and broader
                                            impact (e.g., metrics, scale, beneficiaries, long-term effects).</li>
                                        <li><i class="fas fa-angle-right text-gold"></i> External validation: References to
                                            publications, media coverage, patents, testimonials, or third-party
                                            endorsements.</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="process-list">
                                        <li><i class="fas fa-angle-right text-gold"></i> Supporting documents: CV/resumé,
                                            publications list, letters of support/endorsement (minimum [e.g., 2–3]
                                            recommended; some programs require them), links to verifiable sources.</li>
                                        <li><i class="fas fa-angle-right text-gold"></i> Avoid general praise; prioritize
                                            concrete, differentiated evidence of why the nominee stands out globally.</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tip-box mt-3">
                                <i class="fas fa-lightbulb text-gold me-2"></i> <strong>Tip to Competitive
                                    Nomination:</strong> focus on depth,
                                relevance, and differentiation from peers.
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 -->
                    <div class="process-row scroll-reveal delay-2">
                        <div class="process-visual">
                            <div class="process-number">03</div>
                            <div class="process-icon-box">
                                <i class="fas fa-laptop-code"></i>
                            </div>
                        </div>
                        <div class="process-content">
                            <h4 class="text-white mb-3 h3 fw-bold">Submit via the Secure Online Nomination Portal</h4>
                            <p class="text-white-70 mb-3">Use our dedicated nomination form ["Submit Nomination"]. The form
                                collects:</p>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="feature-pill"><i class="fas fa-user me-2 text-gold"></i>Nominator
                                        information (name, position, affiliation, contact)</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-pill"><i class="fas fa-user-tag me-2 text-gold"></i>Nominee details
                                        (name, role/organization, contact if permitted)
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-pill"><i class="fas fa-list me-2 text-gold"></i>Selected category
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="feature-pill"><i class="fas fa-pen-fancy me-2 text-gold"></i>Narrative
                                        responses aligned to criteria (structured sections for achievements, impact,
                                        innovation).</div>
                                </div>
                                <div class="col-12">
                                    <div class="feature-pill"><i class="fas fa-cloud-upload-alt me-2 text-gold"></i>•
                                        Uploads/links for documents, evidence, endorsements
                                    </div>
                                </div>
                            </div>
                            <p class="text-white-50 mt-3 fs-sm mb-0">Save progress if needed. Submissions must be complete
                                by the deadline.</p>
                        </div>
                    </div>

                    <!-- Step 4 -->
                    <div class="process-row scroll-reveal delay-3">
                        <div class="process-visual">
                            <div class="process-number">04</div>
                            <div class="process-icon-box">
                                <i class="fas fa-check-double"></i>
                            </div>
                        </div>
                        <div class="process-content">
                            <h4 class="text-white mb-3 h3 fw-bold">Confirmation and Post-Submission</h4>
                            <p class="text-white-70 mb-0">Upon submission, receive automated confirmation.
                                @if(isset($activeSeason) && $activeSeason)
                                    Deadline:
                                    {{ \Carbon\Carbon::parse($activeSeason->application_deadline_date)->format('d M Y') }} at
                                    23:59 UTC
                                @elseif(isset($upcomingSeason) && $upcomingSeason)
                                    upcomming season Submissions opening on
                                    {{ \Carbon\Carbon::parse($upcomingSeason->opening_date)->format('d M Y') }} at 23:59 UTC
                                @else
                                    no active or upcomming seasons will update soon
                                @endif
                                . No late submissions
                                accepted. Multiple nominations for the same nominee may be consolidated internally for a
                                holistic view
                            </p>
                        </div>
                    </div>

                    <!-- Step 5 -->
                    <div class="process-row scroll-reveal delay-4">
                        <div class="process-visual">
                            <div class="process-number">05</div>
                            <div class="process-icon-box">
                                <i class="fas fa-gavel"></i>
                            </div>
                        </div>
                        <div class="process-content">
                            <h4 class="text-white mb-3 h3 fw-bold">Evaluation and Timeline</h4>
                            <p class="text-white-70 mb-3">Our rigorous evaluation process ensures global standards.</p>
                            <ul class="process-list two-col">
                                <li><i class="fas fa-user-secret text-gold"></i>All nominations receive blind or anonymized
                                    screening (where identifiers are minimized to focus on merit).</li>
                                <li><i class="fas fa-globe text-gold"></i> Independent international jury (diverse experts
                                    from relevant fields/countries) evaluates based on published criteria, scoring rubrics,
                                    and consensus.</li>
                                <li><i class="fas fa-search-plus text-gold"></i>Shortlisted candidates may be contacted for
                                    clarifications or additional evidence.</li>
                                <li><i class="fas fa-balance-scale text-gold"></i> Final decisions are merit-based only;
                                    no appeals or manual interference.</li>
                                <li><i class="fas fa-balance-scale text-gold"></i> Winners announced; all communications
                                    remain confidential until then.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dynamic Dates (Timeline Pattern) -->
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-lg-8 text-center scroll-reveal">
                    <h2 class="text-white mb-4">Season Schedule</h2>

                    @if(isset($activeSeason) && $activeSeason)
                        <div class="season-status-card active-season p-5">
                            <div class="status-badge bg-success text-white mb-4 shadow"><i
                                    class="fas fa-circle me-2 fs-xs"></i>Nominations Open</div>
                            <h3 class="text-gold display-6 fw-bold mb-4">{{ $activeSeason->name }}</h3>
                            <div class="row g-4 justify-content-center">
                                <div class="col-md-5">
                                    <div class="date-pillar">
                                        <span class="d-block text-white-50 text-uppercase fs-xs mb-2">Opened On</span>
                                        <span
                                            class="d-block text-white h3 fw-bold mb-0">{{ \Carbon\Carbon::parse($activeSeason->opening_date)->format('d M Y') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="date-pillar">
                                        <span class="d-block text-white-50 text-uppercase fs-xs mb-2">Submissions Closes
                                            On</span>
                                        <span
                                            class="d-block text-white h3 fw-bold mb-0">{{ \Carbon\Carbon::parse($activeSeason->application_deadline_date)->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-top border-white-10">
                                <div class="d-flex justify-content-center gap-4 text-white-60 fs-sm flex-wrap">
                                    <span><i class="fas fa-search me-2 text-gold"></i>Judging: 1-2 Months</span>
                                    <span><i class="fas fa-trophy me-2 text-gold"></i>Winners:
                                        {{ \Carbon\Carbon::parse($activeSeason->closing_date)->format('d M Y') }}</span>
                                </div>
                            </div>
                        </div>
                    @elseif(isset($upcomingSeason) && $upcomingSeason)
                        <div class="season-status-card upcoming-season p-5">
                            <div class="status-badge bg-info text-white mb-4 shadow"><i
                                    class="fas fa-clock me-2 fs-xs"></i>Coming Soon</div>
                            <h3 class="text-white display-6 fw-bold mb-4">{{ $upcomingSeason->name }}</h3>
                            <div class="row g-4 justify-content-center">
                                <div class="col-md-6">
                                    <div class="date-pillar">
                                        <span class="d-block text-white-50 text-uppercase fs-xs mb-2">Opens On</span>
                                        <span
                                            class="d-block text-gold h2 fw-bold mb-0">{{ \Carbon\Carbon::parse($upcomingSeason->opening_date)->format('d M Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4 pt-4 border-top border-white-10">
                                <p class="text-white-60 mb-0">Get your nominations ready for the upcoming cycle.</p>
                            </div>
                        </div>
                    @else
                        <div class="season-status-card p-5">
                            <h3 class="text-white mb-3">Season Update</h3>
                            <p class="text-white-60">Please check back soon for the latest award season schedule.</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center pb-5 scroll-reveal">
                <h2 class="text-white mb-4">Ready to Recognize Excellence?</h2>
                <p class="text-white-50 mb-5 fs-5">Nominate exceptional talent today and contribute to global recognition of
                    excellence.</p>
                <a href="{{ route('nomination') }}"
                    class="cta-orb-button text-decoration-none d-inline-block position-relative px-5 py-3 rounded-pill text-white fw-bold overflow-hidden"
                    style="min-width: 250px; background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%); box-shadow: 0 4px 15px rgba(255, 215, 0, 0.4);">
                    <span class="cta-content position-relative z-2">
                        <i class="fas fa-paper-plane me-2"></i> Submit Nomination Now
                    </span>
                    <div class="cta-glow position-absolute top-0 start-0 w-100 h-100 bg-white opacity-25"
                        style="transform: scaleX(0); transform-origin: left; transition: transform 0.4s ease;"></div>
                </a>
            </div>

        </div>
    </section>

    <!-- Page Specific CSS -->
    <style>
        /* Cinematic List Layout */
        .process-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .process-row {
            display: flex;
            align-items: flex-start;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 1.5rem;
            padding: 2.5rem;
            gap: 2.5rem;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }

        .process-row:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: rgba(255, 215, 0, 0.3);
            transform: translateX(10px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .process-row::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(to bottom, #FFD700, transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .process-row:hover::before {
            opacity: 1;
        }

        .process-visual {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-shrink: 0;
            width: 80px;
        }

        .process-number {
            font-size: 3rem;
            font-weight: 900;
            color: rgba(255, 255, 255, 0.1);
            line-height: 1;
            font-family: 'Outfit', sans-serif;
            margin-bottom: 1rem;
        }

        .process-row:hover .process-number {
            color: #FFD700;
        }

        .process-icon-box {
            width: 60px;
            height: 60px;
            background: rgba(255, 215, 0, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #FFD700;
            border: 1px solid rgba(255, 215, 0, 0.2);
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.1);
        }

        .process-content {
            flex-grow: 1;
        }

        .process-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .process-list li {
            margin-bottom: 0.8rem;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.95rem;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .process-list li i {
            margin-top: 5px;
            flex-shrink: 0;
        }

        .feature-pill {
            background: rgba(255, 255, 255, 0.05);
            padding: 0.8rem 1.2rem;
            border-radius: 50px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 0.9rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .tip-box {
            background: linear-gradient(90deg, rgba(255, 215, 0, 0.1), transparent);
            border-left: 3px solid #FFD700;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .process-row {
                flex-direction: column;
                gap: 1.5rem;
                padding: 1.5rem;
            }

            .process-visual {
                flex-direction: row;
                width: 100%;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 0.5rem;
            }

            .process-number {
                font-size: 2rem;
                margin-bottom: 0;
            }

            .process-row:hover {
                transform: translateY(-5px);
            }
        }

        .border-gold-subtle {
            border: 1px solid rgba(255, 215, 0, 0.2);
        }

        .season-status-card {
            background: rgba(15, 15, 20, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            box-shadow: 0 10px 50px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease;
        }

        .season-status-card:hover {
            transform: translateY(-5px);
        }

        .active-season {
            border-color: rgba(255, 215, 0, 0.5);
            box-shadow: 0 0 60px rgba(255, 215, 0, 0.15);
        }

        .upcoming-season {
            border-color: rgba(13, 202, 240, 0.5);
            box-shadow: 0 0 60px rgba(13, 202, 240, 0.15);
        }

        .status-badge {
            display: inline-block;
            padding: 0.6rem 1.5rem;
            border-radius: 50px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            font-size: 0.75rem;
        }

        .date-pillar {
            background: rgba(255, 255, 255, 0.03);
            padding: 1.5rem;
            border-radius: 1rem;
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: background 0.3s ease;
        }

        .date-pillar:hover {
            background: rgba(255, 255, 255, 0.06);
        }

        .cta-orb-button:hover .cta-glow {
            transform: scaleX(1);
        }

        .border-white-10 {
            border-color: rgba(255, 255, 255, 0.1) !important;
        }

        .text-white-80 {
            color: rgba(255, 255, 255, 0.8);
        }

        .text-white-60 {
            color: rgba(255, 255, 255, 0.6);
        }

        .text-white-50 {
            color: rgba(255, 255, 255, 0.5);
        }

        .fs-xs {
            font-size: 0.75rem;
        }

        /* V7 Background Utilities (if not global) */
        .background-canvas {
            position: absolute;
            inset: 0;
            z-index: 0;
            pointer-events: none;
        }

        .void-bg {
            background: radial-gradient(circle at center, #1a1a2e 0%, #000000 100%);
            position: absolute;
            inset: 0;
        }

        .grid-floor {
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            position: absolute;
            inset: 0;
            transform: perspective(600px) rotateX(60deg) translateY(100px) scale(2);
            opacity: 0.2;
            mask-image: linear-gradient(to bottom, transparent, black);
        }
    </style>
@endsection