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
                        <p class="wow fadeInUp" data-wow-delay=".6s">ORIONSM International Tech Awards transcend the
                            confines of a traditional ceremony, rising as a monumental global
                            beacon that unites nations in celebration of extraordinary visionaries—those intrepid
                            souls who boldly reimagine
                            the fabric of our world and wield unyielding resolve to sculpt its destiny, honoring not
                            merely tangible
                            achievements but the profound, fearless courage that propels individuals to shatter
                            entrenched conventions,
                            redefine the very boundaries of possibility, and spearhead transformative innovation
                            that echoes across
                            international landscapes and inspires collective evolution.</p>
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
                                                <span>2010</span>
                                            </div>
                                            <div class="node-content">
                                                <h5>Genesis</h5>
                                                <p>Founded to spotlight tech talent</p>
                                            </div>
                                        </div>
                                        <div class="timeline-node">
                                            <div class="node-circle">
                                                <span>2024</span>
                                            </div>
                                            <div class="node-content">
                                                <h5>Global Impact</h5>
                                                <p>Celebrating worldwide excellence</p>
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
                                                <div class="stat-number">14+</div>
                                                <div class="stat-label">Years</div>
                                            </div>
                                        </div>
                                        <div class="stat-cube">
                                            <div class="cube-content">
                                                <div class="stat-number">50K+</div>
                                                <div class="stat-label">Innovators</div>
                                            </div>
                                        </div>
                                        <div class="stat-cube">
                                            <div class="cube-content">
                                                <div class="stat-number">100+</div>
                                                <div class="stat-label">Countries</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="history-description">
                                        <p>From a grassroots initiative to a globally recognized platform
                                            celebrating
                                            excellence across AI, cybersecurity, and emerging
                                            technologies—transforming
                                            the way we honor innovation.</p>
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
                            <p class="lead mb-0 wow fadeInUp" data-wow-delay=".4s">From 2019 to 2025 - Celebrating
                                technological
                                innovation</p>
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
                                        <span class="step-year">2019</span>
                                    </div>
                                    <div class="step-title">FOUNDATION & VISION</div>
                                    <p>Established the ORIONSM International Tech Awards framework to recognize exceptional
                                        achievements in
                                        technology.
                                    </p>
                                </div>
                                <!-- Connector to Step 2 via CSS -->
                            </div>

                            <!-- Step 2 - 2020 -->
                            <div class="timeline-step step-connect-right" data-aos="fade-up" data-aos-delay="200">
                                <div class="step-card">
                                    <div class="step-circle">
                                        <span class="step-number">2</span>
                                        <span class="step-year">2020</span>
                                    </div>
                                    <div class="step-title">FIRST LAUNCH</div>
                                    <p>Successfully hosted inaugural ceremony, honoring 50+ outstanding achievers from
                                        diverse
                                        sectors.</p>
                                </div>
                                <!-- Connector to Step 3 via CSS -->
                            </div>

                            <!-- Step 3 - 2021 -->
                            <div class="timeline-step step-row-1-end" data-aos="fade-left" data-aos-delay="300">
                                <div class="step-card">
                                    <div class="step-circle">
                                        <span class="step-number">3</span>
                                        <span class="step-year">2021</span>
                                    </div>
                                    <div class="step-title">DIGITAL TRANSFORMATION</div>
                                    <p>Launched online nomination platform, enabling transparent submissions and digital
                                        excellence.
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
                                        <span class="step-year">2024</span>
                                    </div>
                                    <div class="step-title">RECORD PARTICIPATION</div>
                                    <p>Reached milestone with 500+ nominations and 100+ winners, solidifying premier
                                        position.</p>
                                </div>
                                <!-- CSS Connector will be added via class -->
                            </div>

                            <!-- Step 5 - 2023 -->
                            <div class="timeline-step step-connect-left" data-aos="fade-up" data-aos-delay="200">
                                <div class="step-card">
                                    <div class="step-circle">
                                        <span class="step-number">5</span>
                                        <span class="step-year">2023</span>
                                    </div>
                                    <div class="step-title">INNOVATION CATEGORIES</div>
                                    <p>Introduced cutting-edge categories including AI, Machine Learning, and Blockchain
                                        technology.
                                    </p>
                                </div>
                            </div>

                            <!-- Step 4 - 2022 -->
                            <div class="timeline-step step-connect-left" data-aos="fade-left" data-aos-delay="300">
                                <div class="step-card">
                                    <div class="step-circle">
                                        <span class="step-number">4</span>
                                        <span class="step-year">2022</span>
                                    </div>
                                    <div class="step-title">GLOBAL EXPANSION</div>
                                    <p>Achieved international recognition with participants from 25+ countries establishing
                                        global
                                        presence.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Row 3: Step 7 (Final - Current Year) -->
                        <div class="timeline-row timeline-row-final">
                            <div class="timeline-step timeline-step-final" data-aos="fade-up" data-aos-delay="100">
                                <div class="step-card step-card-current">
                                    <div class="step-circle step-circle-current">
                                        <span class="step-number">7</span>
                                        <span class="step-year">2025</span>
                                    </div>
                                    <div class="step-title">EXCELLENCE REDEFINED</div>
                                    <p>Setting new benchmarks with enhanced evaluation criteria and expanded global reach
                                        for 2025.
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
                                            <linearGradient id="missionFlipGrad" x1="8" y1="5"
                                                x2="72" y2="82">
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
                                    <p>To celebrate and honor groundbreaking achievements in technology by
                                        recognizing
                                        individuals and organizations driving innovation and excellence in the IT
                                        sector.</p>
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
                                        <circle cx="40" cy="40" r="35" stroke="url(#visionFlipGrad1)"
                                            stroke-width="3" fill="none" />
                                        <circle cx="40" cy="40" r="25" stroke="url(#visionFlipGrad2)"
                                            stroke-width="2" fill="none" />
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
                                    <p>To build a global platform that connects, inspires, and celebrates tech
                                        leaders—fostering
                                        creativity, collaboration, and meaningful impact through awards and
                                        recognition.</p>
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
