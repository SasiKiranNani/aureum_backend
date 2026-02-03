@extends('layouts.frontend.index')

@section('contents')
    <!-- Ultimate "Why Participate" V7 - Crystal Symmetry -->
    <section class="ultimate-why-enter overflow-hidden position-relative pt-5">
        <!-- Living Background System -->
        <div class="background-canvas">
            <div class="void-bg"></div>
            <div class="grid-floor"></div>
            <div class="moving-lights"></div>
            <div class="stars-twinkle"></div>
        </div>

        <div class="container position-relative z-2">
            <!-- Hero Section: Cinematic & Responsive -->
            <div class="hero-wrapper text-center mb-5 py-lg-5 py-4 scroll-reveal" style="padding-bottom: 0;">
                <div class="hero-backdrop"></div> <!-- Glow behind text -->

                <div class="badge-pill mb-4 d-inline-block">
                    <span class="text-gold fw-bold text-uppercase tracking-wider fs-xs">
                        <i class="fas fa-trophy me-2"></i>Orionsm International Tech Awards
                    </span>
                </div>
                <!-- Clamp() for perfect responsiveness -->
                <h1 class="hero-title fw-900 text-white mb-4">
                    Why <span class="text-gold-liquid">Participate?</span>
                </h1>
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-xl-12">
                        <p class="hero-subtitle text-white-60 mb-4 leading-relaxed">
                            Participating in the Orionsm Global Awards provides a structured opportunity for recognition of
                            exceptional contributions in technology, innovation, and related fields. The program is designed
                            to identify and highlight merit-based achievements through an independent, evidence-driven
                            evaluation process.
                        </p>
                        <p class="hero-subtitle text-white-60 mb-4 leading-relaxed">
                            Nominations are assessed on verifiable impact, originality, and global relevance by a diverse
                            expert jury. Entry is merit-focused, open to individuals, teams, and organizations worldwide,
                            with no barriers based on prior fame or scale.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Attributes Section: Prism Grid -->
            <div class="mb-5 pb-lg-5 pb-3">
                <div class="text-center mb-5 scroll-reveal">
                    <h2 class="section-title text-white mt-2">Key Program Attributes</h2>
                    <p class="text-white-50">Participation allows your work to undergo rigorous, impartial review,
                        potentially yielding external validation.</p>
                </div>

                <div class="row g-4 justify-content-center">
                    <!-- Attribute 1 -->
                    <div class="col-lg-6 scroll-reveal delay-1">
                        <div class="prism-card h-100 p-4 p-lg-5" data-tilt data-tilt-max="5">
                            <div class="corner-accent top-left"></div>
                            <div class="corner-accent bottom-right"></div>

                            <div class="prism-content position-relative z-2">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="icon-circle bg-gold-dark text-gold me-3">
                                        <i class="fas fa-balance-scale fs-4"></i>
                                    </span>
                                    <h3 class="text-white h4 fw-bold mb-0">Merit-Based Evaluation</h3>
                                </div>
                                <p class="text-white-60 mb-0">
                                    Selections rely solely on demonstrated excellence, supported by quantifiable evidence
                                    and third-party validations (no self-promotion or fee-based advantages).
                                </p>
                            </div>
                            <div class="prism-shine"></div>
                        </div>
                    </div>

                    <!-- Attribute 2 -->
                    <div class="col-lg-6 scroll-reveal delay-2">
                        <div class="prism-card h-100 p-4 p-lg-5" data-tilt data-tilt-max="5">
                            <div class="corner-accent top-left"></div>
                            <div class="corner-accent bottom-right"></div>

                            <div class="prism-content position-relative z-2">
                                <div class="d-flex align-items-center mb-4">
                                    <span class="icon-circle bg-blue-dark text-blue-400 me-3">
                                        <i class="fas fa-globe-americas fs-4"></i>
                                    </span>
                                    <h3 class="text-white h4 fw-bold mb-0">Global Scope</h3>
                                </div>
                                <p class="text-white-60 mb-0">
                                    Recognized across 80+ countries since founding in 2016, with participants and judges
                                    from multiple regions.
                                </p>
                            </div>
                            <div class="prism-shine"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Benefits Section: Constellation Grid (3-2) -->
            <div class="mb-5 pb-5">
                <div class="text-center mb-5 scroll-reveal">
                    <h2 class="section-title text-white mb-2">Key Benefits of Participation</h2>
                    <p class="text-white-50">Participation offers several objective advantages, grounded in standard
                        outcomes observed in Orionsm Global award.</p>
                </div>

                <!-- Row 1: 3 Items -->
                <div class="row g-4 justify-content-center mb-4">
                    <!-- Benefit 1 -->
                    <div class="col-lg-4 col-md-6 scroll-reveal delay-1">
                        <div class="prism-card h-100 p-4" data-tilt data-tilt-max="5">
                            <div class="prism-content position-relative z-2">
                                <i class="fas fa-certificate text-gold fs-2 mb-3"></i>
                                <h4 class="text-white h5 fw-bold mb-3">1. External Validation</h4>
                                <p class="text-white-60 text-sm mb-0">A nomination or shortlisting serves as third-party
                                    endorsement of excellence, innovation, and integrity. This benchmark can strengthen
                                    professional profiles, grant applications, or stakeholder communications.</p>
                            </div>
                            <div class="prism-border-gradient"></div>
                        </div>
                    </div>
                    <!-- Benefit 2 -->
                    <div class="col-lg-4 col-md-6 scroll-reveal delay-2">
                        <div class="prism-card h-100 p-4" data-tilt data-tilt-max="5">
                            <div class="prism-content position-relative z-2">
                                <i class="fas fa-eye text-gold fs-2 mb-3"></i>
                                <h4 class="text-white h5 fw-bold mb-3">2. Increased Visibility & Networking Opportunities
                                </h4>
                                <p class="text-white-60 text-sm mb-0">A Shortlisted or winning entries are highlighted
                                    through official announcements, potentially attracting attention from industry experts,
                                    media, recruiters, and collaborators. Past cycles have seen broader exposure for
                                    participants.</p>
                                <p class="text-white-60 text-sm mb-0">Global recognition places achievements in an
                                    international context, useful for cross-border partnerships or talent acquisition.</p>
                            </div>
                            <div class="prism-border-gradient"></div>
                        </div>
                    </div>
                    <!-- Benefit 3 -->
                    <div class="col-lg-4 col-md-6 scroll-reveal delay-3">
                        <div class="prism-card h-100 p-4" data-tilt data-tilt-max="5">
                            <div class="prism-content position-relative z-2">
                                <i class="fas fa-chart-line text-gold fs-2 mb-3"></i>
                                <h4 class="text-white h5 fw-bold mb-3">3. Benchmarking Against Global Peers</h4>
                                <p class="text-white-60 text-sm mb-0">The evaluation process provides feedback on how your
                                    work measures against international standards of impact, originality, and rigor.</p>
                                <p class="text-white-60 text-sm mb-0">Even non-advancing nominations undergo structured
                                    review, highlighting strengths and areas for evidence enhancement.</p>
                            </div>
                            <div class="prism-border-gradient"></div>
                        </div>
                    </div>
                </div>

                <!-- Row 2: 2 Items Centered -->
                <div class="row g-4 justify-content-center">
                    <!-- Benefit 4 -->
                    <div class="col-lg-5 col-md-6 scroll-reveal delay-4">
                        <div class="prism-card h-100 p-4" data-tilt data-tilt-max="5">
                            <div class="prism-content position-relative z-2">
                                <i class="fas fa-star text-gold fs-2 mb-3"></i>
                                <h4 class="text-white h5 fw-bold mb-3">4. Celebration of Substantive Achievements </h4>
                                <p class="text-white-60 text-sm mb-0">The program recognizes the depth of effort behind
                                    innovations including research, iteration, and real-world application rather than
                                    superficial metrics. </p>
                                <p class="text-white-60 text-sm mb-0">This focus aligns with global emphasis on sustainable,
                                    impactful contributions.</p>
                            </div>
                            <div class="prism-border-gradient"></div>
                        </div>
                    </div>
                    <!-- Benefit 5 -->
                    <div class="col-lg-5 col-md-6 scroll-reveal delay-5">
                        <div class="prism-card h-100 p-4" data-tilt data-tilt-max="5">
                            <div class="prism-content position-relative z-2">
                                <i class="fas fa-users text-gold fs-2 mb-3"></i>
                                <h4 class="text-white h5 fw-bold mb-3">5. Inclusivity and Equal Opportunity</h4>
                                <p class="text-white-60 text-sm mb-0">Entries are evaluated purely on merit, regardless of
                                    organization size, geography, or prior recognition.</p>
                                <p class="text-white-60 text-sm mb-0">This open approach supports diverse participants, from
                                    emerging innovators to established entities.</p>
                            </div>
                            <div class="prism-border-gradient"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Stands Out Section (Unified Aesthetics) -->
            <div class="stands-out-wrapper mt-5 position-relative scroll-reveal">
                <div class="holographic-bg"></div>
                <div class="text-center mb-5 position-relative z-2">
                    <h2 class="text-white display-5 fw-bold mb-4">Why Orionsm Global Awards Stands Out:</h2>
                </div>

                <div class="row g-4 justify-content-center">
                    <!-- Point 1 -->
                    <div class="col-md-6 col-lg-5">
                        <div class="prism-card h-100 p-lg-5 p-4" data-tilt data-tilt-max="10">
                            <!-- Distinctive Markers for Stands Out -->
                            <div class="corner-accent top-right bg-gold"></div>

                            <div class="prism-content position-relative z-2">
                                <span class="big-number">01</span>
                                <h4 class="text-gold h3 mb-3">Focus on Verifiable Impact</h4>
                                <p class="text-white-70 mb-0">Emphasizes quantifiable outcomes, external validations, and
                                    global scope key for strong ratings in recency, prestige, credibility, scope,
                                    achievement, and objectivity.</p>
                            </div>
                            <div class="prism-shine"></div>
                        </div>
                    </div>
                    <!-- Point 2 -->
                    <div class="col-md-6 col-lg-5">
                        <div class="prism-card h-100 p-lg-5 p-4" data-tilt data-tilt-max="10">
                            <div class="corner-accent top-right bg-gold"></div>

                            <div class="prism-content position-relative z-2">
                                <span class="big-number">02</span>
                                <h4 class="text-gold h3 mb-3">No Pay-to-Win Elements </h4>
                                <p class="text-white-70 mb-0">Nomination/participation value derives from merit alone.</p>
                            </div>
                            <div class="prism-shine"></div>
                        </div>
                    </div>
                </div>

                <!-- CTA -->
                <div class="cta-wrapper text-center mt-5 pt-lg-5 pt-3 position-relative z-2">
                    <p class="text-white-50 mb-4 fs-5">If your work demonstrates verifiable excellence with global or
                        regional impact, consider submitting for objective evaluation.</p>
                    <a href="{{ route('nomination') }}" class="cta-orb-button auth-check-nomination text-decoration-none">
                        <span class="cta-content">
                            <span class="cta-label">Nominate Now</span>
                            <i class="fas fa-arrow-right ms-2"></i>
                        </span>
                        <div class="cta-glow"></div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* --- Base & Reset --- */
        .ultimate-why-enter {
            padding-top: 140px;
            /* Adjusted for header clearance */
            padding-bottom: 100px;
            background-color: #050507;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            color: #fff;
        }

        h1,
        h2,
        h3,
        h4 {
            text-wrap: balance;
        }

        p {
            text-wrap: pretty;
        }

        /* --- V7 Backgrounds --- */
        .background-canvas {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .void-bg {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 30%, #1a1a2e 0%, #050507 70%);
            /* Deep radial void */
        }

        .grid-floor {
            position: absolute;
            bottom: -50%;
            left: -50%;
            width: 200%;
            height: 100%;
            background-image: linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 60px 60px;
            transform: perspective(600px) rotateX(60deg);
            opacity: 0.4;
            mask-image: linear-gradient(to top, black, transparent);
        }

        .stars-twinkle {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(1px 1px at 20px 30px, #fff, transparent);
            background-size: 100px 100px;
            opacity: 0.2;
            animation: twinkle 5s infinite;
        }

        /* --- Hero V7: Cinematic --- */
        .hero-title {
            font-size: clamp(2.5rem, 5vw + 1rem, 5rem);
            /* Responsive Clamp */
            letter-spacing: -2px;
            line-height: 1.05;
        }

        .hero-subtitle {
            font-size: clamp(1rem, 1.5vw, 1.25rem);
        }

        .text-gold-liquid {
            background: linear-gradient(135deg, #FFD700 0%, #FFF5CC 30%, #FFD700 50%, #B8860B 80%, #FFD700 100%);
            background-size: 200% auto;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            animation: textShimmer 6s linear infinite;
        }

        .hero-backdrop {
            position: absolute;
            top: 0%;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 300px;
            background: radial-gradient(ellipse at center, rgba(76, 29, 149, 0.4), transparent 70%);
            filter: blur(80px);
            z-index: -1;
            pointer-events: none;
        }

        .badge-pill {
            background: rgba(255, 215, 0, 0.08);
            padding: 8px 16px;
            border-radius: 100px;
            border: 1px solid rgba(255, 215, 0, 0.2);
            backdrop-filter: blur(5px);
        }

        /* --- Prism Card (Advanced) --- */
        .prism-card {
            background: rgba(15, 15, 20, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            /* Slightly sharper than 30px */
            position: relative;
            overflow: hidden;
            transform-style: preserve-3d;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.5);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            backdrop-filter: blur(12px);
        }

        .prism-card:hover {
            transform: translateY(-8px) scale(1.02);
            border-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.6);
        }

        /* Prism Light Effects */
        .prism-shine {
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 30%, rgba(255, 255, 255, 0.05) 50%, transparent 70%);
            background-size: 200% 200%;
            opacity: 0;
            transition: opacity 0.5s;
            pointer-events: none;
        }

        .prism-card:hover .prism-shine {
            opacity: 1;
            animation: shineSweep 1s forwards;
        }

        /* Corner Accents (Technical Look) */
        .corner-accent {
            position: absolute;
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 215, 0, 0.3);
            transition: all 0.3s;
        }

        .corner-accent.top-left {
            top: 12px;
            left: 12px;
            border-right: none;
            border-bottom: none;
            border-radius: 8px 0 0 0;
        }

        .corner-accent.bottom-right {
            bottom: 12px;
            right: 12px;
            border-left: none;
            border-top: none;
            border-radius: 0 0 8px 0;
        }

        .corner-accent.top-right {
            top: 12px;
            right: 12px;
            border-left: none;
            border-bottom: none;
            border-radius: 0 8px 0 0;
        }

        .prism-card:hover .corner-accent {
            border-color: #FFD700;
            width: 30px;
            height: 30px;
        }

        .icon-circle {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .big-number {
            font-size: 6rem;
            font-weight: 800;
            color: rgba(255, 255, 255, 0.02);
            position: absolute;
            top: -15px;
            right: 10px;
            transform: translateZ(-20px);
            line-height: 1;
            font-family: 'Oswald', sans-serif;
            /* If avail, else fallback */
        }

        /* --- CTA Orb --- */
        .cta-orb-button {
            display: inline-block;
            position: relative;
            padding: 18px 45px;
            border-radius: 100px;
            background: #000;
            color: #FFD700;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            border: 1px solid rgba(255, 215, 0, 0.3);
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .cta-orb-button:hover {
            transform: scale(1.05);
            box-shadow: 0 0 40px rgba(255, 215, 0, 0.3);
            border-color: #FFD700;
            color: #fff;
        }

        .cta-glow {
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 215, 0, 0.3), transparent 60%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .cta-orb-button:hover .cta-glow {
            opacity: 1;
        }

        /* --- Animations --- */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease-out;
        }

        .scroll-reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .delay-1 {
            transition-delay: 0.1s;
        }

        .delay-2 {
            transition-delay: 0.2s;
        }

        .delay-3 {
            transition-delay: 0.3s;
        }

        .delay-4 {
            transition-delay: 0.4s;
        }

        .delay-5 {
            transition-delay: 0.5s;
        }

        @keyframes textShimmer {
            0% {
                background-position: 0% 50%;
            }

            100% {
                background-position: 200% 50%;
            }
        }

        @keyframes shineSweep {
            0% {
                background-position: 200% 200%;
            }

            100% {
                background-position: -200% -200%;
            }
        }

        @keyframes twinkle {

            0%,
            100% {
                opacity: 0.2;
            }

            50% {
                opacity: 0.5;
            }
        }

        /* Bg for stands out wrapper */
        .holographic-bg {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 0%, rgba(76, 29, 149, 0.15) 0%, transparent 70%);
            opacity: 0.6;
            pointer-events: none;
        }

        .text-white-60 {
            color: rgba(255, 255, 255, 0.6);
        }

        .text-white-70 {
            color: rgba(255, 255, 255, 0.7);
        }

        /* --- Mobile < 768px --- */
        @media (max-width: 768px) {
            .ultimate-why-enter {
                padding-top: 100px;
            }

            .prism-card {
                padding: 1.5rem !important;
            }

            /* Reduce padding */
            .corner-accent {
                width: 15px;
                height: 15px;
            }

            /* Smaller accents */
            .big-number {
                font-size: 4rem;
                top: -5px;
                right: 5px;
            }

            .hero-backdrop {
                height: 200px;
                opacity: 0.7;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- Vanilla 3D Tilt Effect ---
            const tiltCards = document.querySelectorAll('[data-tilt]');

            // Check if mobile (disable heavy tilt on phones to save battery/perf)
            const isMobile = window.innerWidth < 768;

            tiltCards.forEach(card => {
                if (isMobile) return; // Skip logic on mobile

                const limit = card.getAttribute('data-tilt-max') || 10;

                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;

                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;

                    const rotateX = ((y - centerY) / centerY) * -limit;
                    const rotateY = ((x - centerX) / centerX) * limit;

                    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.02)`;
                });

                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale(1)';
                });
            });

            // --- Scroll Observer ---
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el));
        });
    </script>
@endsection