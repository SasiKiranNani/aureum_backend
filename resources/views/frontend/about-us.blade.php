@extends('layouts.frontend.index')

@section('contents')
    <section id="section-about" class="bg-dark section-dark text-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-12 text-center">
                    <div class="subtitle wow fadeInUp mb-3">About ORIONSM</div>
                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Welcome to ORIONSM International Tech Awards</h2>
                </div>
            </div>
            <div class="row gx-5 align-items-center justify-content-between">
                <div class="col-lg-6">
                    <div class="">
                        <!-- me-lg-5 pe-lg-5 py-5 my-5 -->
                        <!-- <div class="subtitle wow fadeInUp" data-wow-delay=".2s">About ORIONSM</div>
                                                                                                                                    <h2 class="wow fadeInUp" data-wow-delay=".4s">Welcome to ORIONSM International Tech Awards</h2> -->
                        <p class="wow fadeInUp" data-wow-delay=".6s">The Orionsm Global Awards represent a leading
                            international platform dedicated to recognizing outstanding contributions to AI governance,
                            ethical AI development, regulatory frameworks, and responsible innovation. Established in 2016
                            by the International AI Governance Consortium (IAGC), the program brings together global
                            experts, institutions, and stakeholders to honor those who advance transparent, equitable,
                            accountable, and human-centered AI systems. It serves as a benchmark for excellence in AI
                            governance, emphasizing verifiable impact on policy, standards, risk mitigation, and societal
                            trust in artificial intelligence technologies worldwide.</p>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="wow scaleIn">
                        <img src="{{ asset('frontend/images/about.jpg') }}" alt="">
                        <!-- class="w-100 rotate-animation" -->
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- ULTRA PREMIUM Mission & History - Creative Design -->
    <section class="ultra-mission-section section-dark text-light">

        <!-- Animated Morphing Background -->
        <div class="morph-bg">
            <div class="blob blob-1"></div>
            <div class="blob blob-2"></div>
            <div class="blob blob-3"></div>
        </div>

        <!-- Diagonal Accent Line -->
        <div class="diagonal-accent"></div>

        <div class="container">

            <!-- Unique Section Header -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-10 text-center">
                    <div class="premium-header wow fadeInUp" data-wow-delay="0.1s">
                        <div class="floating-letter-group">
                            <span class="float-letter">M</span>
                            <span class="float-letter">I</span>
                            <span class="float-letter">S</span>
                            <span class="float-letter">S</span>
                            <span class="float-letter">I</span>
                            <span class="float-letter">O</span>
                            <span class="float-letter">N</span>
                        </div>
                        <div class="header-divider"></div>
                        <p class="ultra-tagline">
                            Honoring pioneers who drive innovation, inspire change,<br />
                            and shape the future through technology.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Split-Screen History Design -->
            <div class="row mb-5 gx-0">
                <div class="col-12">
                    <div class="history-split-container wow fadeInUp" data-wow-delay="0.2s">
                        <!-- Left Side: 3D Timeline -->
                        <div class="row g-0">
                            <div class="col-lg-5">
                                <div class="timeline-3d">
                                    <div class="timeline-bg-pattern"></div>
                                    <h3 class="timeline-title">Our Journey</h3>
                                    <div class="timeline-track">
                                        <div class="timeline-node active">
                                            <div class="node-circle">
                                                <span>2016</span>
                                            </div>
                                            <div class="node-content">
                                                <h5>Foundation</h5>
                                                <p>Launched to establish rigorous recognition for advancements in AI
                                                    governance and ethics.</p>
                                            </div>
                                        </div>
                                        <div class="timeline-node">
                                            <div class="node-circle">
                                                <span>2026</span>
                                            </div>
                                            <div class="node-content">
                                                <h5>Global Leadership</h5>
                                                <p>Celebrating a decade of international influence in responsible AI
                                                    standards.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Side: Dynamic Content -->
                            <div class="col-lg-7">
                                <div class="history-dynamic-panel">
                                    <div class="panel-glow"></div>
                                    <div class="stat-grid">
                                        <div class="stat-cube">
                                            <div class="cube-content">
                                                <div class="stat-number">10+</div>
                                                <div class="stat-label">Years of Operation</div>
                                            </div>
                                        </div>
                                        <div class="stat-cube">
                                            <div class="cube-content">
                                                <div class="stat-number">25,000+ </div>
                                                <div class="stat-label">Participants & Nominees</div>
                                            </div>
                                        </div>
                                        <div class="stat-cube">
                                            <div class="cube-content">
                                                <div class="stat-number">80+ </div>
                                                <div class="stat-label">Countries Represented</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="history-description">
                                        <p>Evolving from an initiative focused on early AI ethical frameworks to a
                                            prestigious international program, the Orionsm Global Awards now set high
                                            standards for AI governance, policy impact, ethical innovation, and regulatory
                                            excellence continuously redefining global expectations for trustworthy AI..</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Stepped Timeline Section - Match Reference Design -->
            <section id="section-timeline" class="bg-dark section-dark text-light stepped-timeline-section">
                <div class="container">
                    <div class="row g-4 mb-5">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <div class="subtitle wow fadeInUp mb-3">7 MILESTONES</div>
                            <h2 class="wow fadeInUp" data-wow-delay=".2s">Our Journey to Excellence</h2>
                            <p class="lead mb-0 wow fadeInUp" data-wow-delay=".4s">From 2016 to 2026 - Elevating Global AI
                                Governance Standards</p>
                        </div>
                    </div>

                    <!-- Stepped Timeline Container -->
                    <div class="stepped-timeline" data-aos="fade-up">
                        <!-- Row 1: Steps 1, 2, 3 -->
                        <div class="timeline-row">
                            <!-- Step 1 - 2019 -->
                            <div class="timeline-step step-connect-right" data-aos="fade-right" data-aos-delay="100">
                                <div class="step-card">
                                    <div class="step-circle">
                                        <span class="step-number">1</span>
                                        <span class="step-year">2016</span>
                                    </div>
                                    <div class="step-title">FOUNDATION & VISION </div>
                                    <p>Established the Orionsm Global Awards to recognize foundational
                                        work in AI ethics, governance structures, and responsible deployment frameworks.</p>
                                </div>
                                <!-- Connector to Step 2 via CSS -->
                            </div>

                            <!-- Step 2 - 2020 -->
                            <div class="timeline-step step-connect-right" data-aos="fade-up" data-aos-delay="200">
                                <div class="step-card">
                                    <div class="step-circle">
                                        <span class="step-number">2</span>
                                        <span class="step-year">2017</span>
                                    </div>
                                    <div class="step-title">INAUGURAL EDITION </div>
                                    <p>Hosted the first awards ceremony, honoring 50+ leaders in AI policy
                                        and ethical practices from multiple continents.</p>
                                </div>
                                <!-- Connector to Step 3 via CSS -->
                            </div>

                            <!-- Step 3 - 2021 -->
                            <div class="timeline-step step-row-1-end" data-aos="fade-left" data-aos-delay="300">
                                <div class="step-card">
                                    <div class="step-circle">
                                        <span class="step-number">3</span>
                                        <span class="step-year">2018</span>
                                    </div>
                                    <div class="step-title">DIGITAL & TRANSPARENT PROCESSES </div>
                                    <p>Introduced a secure, open nomination platform with verifiable submission tracking to
                                        enhance accessibility and integrity in AI governance evaluations.
                                    </p>
                                </div>
                                <!-- CSS Connector will be added via class -->
                            </div>
                        </div>

                        <!-- Row 2: Steps 6, 5, 4 (Reversed) -->
                        <div class="timeline-row timeline-row-reverse">
                            <!-- Step 6 - 2024 -->
                            <div class="timeline-step step-row-2-end" data-aos="fade-right" data-aos-delay="100">
                                <div class="step-card">
                                    <div class="step-circle">
                                        <span class="step-number">6</span>
                                        <span class="step-year">2021</span>
                                    </div>
                                    <div class="step-title">PEAK ENGAGEMENT & IMPACT </div>
                                    <p>Recorded over 400 nominations and 100+ honorees, with
                                        awardees influencing major policy developments including contributions to
                                        international AI guidelines.</p>
                                </div>
                                <!-- CSS Connector will be added via class -->
                            </div>

                            <!-- Step 5 - 2023 -->
                            <div class="timeline-step step-connect-left" data-aos="fade-up" data-aos-delay="200">
                                <div class="step-card">
                                    <div class="step-circle">
                                        <span class="step-number">5</span>
                                        <span class="step-year">2020</span>
                                    </div>
                                    <div class="step-title">SPECIALIZED GOVERNANCE CATEGORIES </div>
                                    <p>Launched dedicated categories for AI fairness,
                                        algorithmic accountability, regulatory innovation, and international AI standards
                                        alignment.</p>
                                </div>
                            </div>

                            <!-- Step 4 - 2022 -->
                            <div class="timeline-step step-connect-left" data-aos="fade-left" data-aos-delay="300">
                                <div class="step-card">
                                    <div class="step-circle">
                                        <span class="step-number">4</span>
                                        <span class="step-year">2019</span>
                                    </div>
                                    <div class="step-title">INTERNATIONAL GROWTH </div>
                                    <p>Expanded to include participants from 30+ countries, gaining
                                        recognition in global AI regulatory dialogues and partnerships with international
                                        bodies.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Row 3: Step 7 (Final - Current Year) -->
                        <div class="timeline-row timeline-row-final">
                            <div class="timeline-step timeline-step-final" data-aos="fade-up" data-aos-delay="100">
                                <div class="step-card step-card-current">
                                    <div class="step-circle step-circle-current">
                                        <span class="step-number">7</span>
                                        <span class="step-year">2026</span>
                                    </div>
                                    <div class="step-title">STANDARDS REDEFINED </div>
                                    <p>Implementing enhanced, evidence-based evaluation protocols
                                        aligned with global best practices, extending influence to 80+ countries for the
                                        2026 cycle.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 3D Flip Cards for Mission & Vision -->
            <div class="row g-4">
                <!-- Mission Card with 3D Flip -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="flip-card-3d">
                        <div class="flip-card-inner">
                            <!-- Front Face -->
                            <div class="flip-card-front mission-front">
                                <div class="card-mesh-bg"></div>
                                <div class="floating-icon">
                                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                                        <path d="M40 5L47 30L72 37L53 57L58 82L40 69L22 82L27 57L8 37L33 30L40 5Z"
                                            fill="url(#missionFlipGrad)" stroke="#FFD700" stroke-width="2" />
                                        <defs>
                                            <linearGradient id="missionFlipGrad" x1="8" y1="5" x2="72" y2="82">
                                                <stop stop-color="#FFD700" />
                                                <stop offset="1" stop-color="#FF6B00" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <h3 class="flip-title">Our Mission</h3>
                                <div class="flip-prompt">Hover to explore →</div>
                            </div>

                            <!-- Back Face -->
                            <div class="flip-card-back mission-back">
                                <div class="back-decoration"></div>
                                <div class="back-content">
                                    <h4>Our Mission</h4>
                                    <p>To identify, evaluate, and celebrate pioneering achievements in AI governance that
                                        strengthen ethical standards, promote inclusive regulatory practices, and ensure AI
                                        technologies serve humanity responsibly.</p>
                                    <p>Our Mission To rigorously assess and honor individuals, organizations, and
                                        initiatives that demonstrate measurable progress in AI ethics, policy formulation,
                                        bias mitigation, transparency mechanisms, and global AI governance frameworks,
                                        thereby elevating international benchmarks and encouraging widespread adoption of
                                        responsible AI principles.</p>
                                    <div class="back-accent-line"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Vision Card with 3D Flip -->
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="flip-card-3d">
                        <div class="flip-card-inner">
                            <!-- Front Face -->
                            <div class="flip-card-front vision-front">
                                <div class="card-mesh-bg"></div>
                                <div class="floating-icon">
                                    <svg width="80" height="80" viewBox="0 0 80 80" fill="none">
                                        <circle cx="40" cy="40" r="35" stroke="url(#visionFlipGrad1)" stroke-width="3"
                                            fill="none" />
                                        <circle cx="40" cy="40" r="25" stroke="url(#visionFlipGrad2)" stroke-width="2"
                                            fill="none" />
                                        <circle cx="40" cy="40" r="15" fill="url(#visionFlipGrad3)" />
                                        <defs>
                                            <linearGradient id="visionFlipGrad1">
                                                <stop stop-color="#00F5FF" />
                                                <stop offset="1" stop-color="#9D00FF" />
                                            </linearGradient>
                                            <linearGradient id="visionFlipGrad2">
                                                <stop stop-color="#4FACFE" />
                                                <stop offset="1" stop-color="#00F2FE" />
                                            </linearGradient>
                                            <linearGradient id="visionFlipGrad3">
                                                <stop stop-color="#A8EDEA" />
                                                <stop offset="1" stop-color="#FED6E3" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <h3 class="flip-title">Our Vision</h3>
                                <div class="flip-prompt">Hover to explore →</div>
                            </div>

                            <!-- Back Face -->
                            <div class="flip-card-back vision-back">
                                <div class="back-decoration"></div>
                                <div class="back-content">
                                    <h4>Our Vision</h4>
                                    <p>To foster a unified global ecosystem where AI governance leaders collaborate,
                                        innovate, and set enduring standards that guarantee trustworthy AI deployment across
                                        all sectors and societies.</p>
                                    <p>Our Vision To establish the Orionsm Global Awards as the definitive global authority
                                        on AI governance excellence, creating lasting networks of collaboration among
                                        policymakers, researchers, industry leaders, and civil society to proactively
                                        address emerging AI challenges and drive sustainable, equitable progress in
                                        artificial intelligence.</p>
                                    <div class="back-accent-line"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection