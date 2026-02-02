@extends('layouts.frontend.index')

@section('contents')
    <!-- Nomination Process Section - Premium Design -->
    <section class="nom-process-premium">
        <!-- Animated Background -->
        <div class="nom-bg-effects">
            <div class="nom-gradient-overlay"></div>
            <div class="nom-orbs">
                <div class="nom-orb nom-orb-1"></div>
                <div class="nom-orb nom-orb-2"></div>
                <div class="nom-orb nom-orb-3"></div>
            </div>
        </div>

        <!-- Hero Header -->
        <div class="container">
            <div class="nom-hero-header">
                <div class="nom-decoration">
                    <span class="nom-line"></span>
                    <i class="fas fa-route nom-icon"></i>
                    <span class="nom-line"></span>
                </div>
                <h1 class="nom-main-title">
                    <span class="nom-highlight">Nomination</span> Process
                </h1>
                <p class="nom-subtitle">Recognizing Excellence in Technology and Innovation</p>
            </div>

            <!-- Introduction Card -->
            <div class="nom-intro-card">
                <div class="nom-intro-glow"></div>
                <p class="nom-intro-text">
                    The <strong class="gold-text">ORIONSM International Tech Awards</strong> celebrate individuals and
                    organizations that are shaping the future of technology through creativity, leadership, and
                    impact.
                    If you or someone you know has made a meaningful contribution in the tech space, we welcome your
                    nomination.
                </p>
            </div>

            <!-- Timeline Process -->
            <div class="nom-process-timeline">
                <!-- Step 1 -->
                <div class="nom-timeline-step" data-step="1">
                    <div class="nom-step-marker">
                        <div class="nom-marker-circle">
                            <span class="nom-marker-number">1</span>
                        </div>
                        <div class="nom-step-line"></div>
                    </div>
                    <div class="nom-step-card">
                        <div class="nom-card-glow-effect"></div>
                        <div class="nom-step-icon-wrapper">
                            <i class="fas fa-search nom-step-icon-large"></i>
                        </div>
                        <h3 class="nom-step-card-title">Choose Your Award Category</h3>
                        <p class="nom-step-card-text">
                            Explore our award categories and select the one that best aligns with the nominee's
                            achievements.
                            Each category includes specific criteria to help guide your submission.
                        </p>
                        <a href="#" class="nom-step-cta-link">
                            <span>View Categories</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="nom-timeline-step" data-step="2">
                    <div class="nom-step-marker">
                        <div class="nom-marker-circle">
                            <span class="nom-marker-number">2</span>
                        </div>
                        <div class="nom-step-line"></div>
                    </div>
                    <div class="nom-step-card">
                        <div class="nom-card-glow-effect"></div>
                        <div class="nom-step-icon-wrapper">
                            <i class="fas fa-file-alt nom-step-icon-large"></i>
                        </div>
                        <h3 class="nom-step-card-title">Prepare Your Nomination</h3>
                        <p class="nom-step-card-text">
                            Get your materials ready. A strong nomination typically includes:
                        </p>
                        <ul class="nom-step-checklist">
                            <li><i class="fas fa-check-circle"></i> A detailed summary of the achievement or
                                innovation</li>
                            <li><i class="fas fa-check-circle"></i> Evidence of impact (e.g., metrics, testimonials,
                                press coverage)</li>
                            <li><i class="fas fa-check-circle"></i> Supporting documentation or links to
                                work/products</li>
                        </ul>
                        <p class="nom-step-card-text">
                            Make sure your submission clearly demonstrates why the nominee stands out.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="nom-timeline-step" data-step="3">
                    <div class="nom-step-marker">
                        <div class="nom-marker-circle">
                            <span class="nom-marker-number">3</span>
                        </div>
                        <div class="nom-step-line"></div>
                    </div>
                    <div class="nom-step-card">
                        <div class="nom-card-glow-effect"></div>
                        <div class="nom-step-icon-wrapper">
                            <i class="fas fa-user-edit nom-step-icon-large"></i>
                        </div>
                        <h3 class="nom-step-card-title">Complete the Nomination Form</h3>
                        <p class="nom-step-card-text">
                            Fill in our official Nomination Form with complete and accurate information.
                            You may nominate yourself, your organization, or another deserving candidate.
                        </p>
                        <a href="#" class="nom-step-cta-link">
                            <span>Access Nomination Form</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Step 4 -->
                <div class="nom-timeline-step" data-step="4">
                    <div class="nom-step-marker">
                        <div class="nom-marker-circle">
                            <span class="nom-marker-number">4</span>
                        </div>
                        <div class="nom-step-line"></div>
                    </div>
                    <div class="nom-step-card">
                        <div class="nom-card-glow-effect"></div>
                        <div class="nom-step-icon-wrapper">
                            <i class="fas fa-check-circle nom-step-icon-large"></i>
                        </div>
                        <h3 class="nom-step-card-title">Submit Your Nomination</h3>
                        <p class="nom-step-card-text">
                            Double-check your form and supporting materials before submission. Once submitted,
                            you'll receive a confirmation email from our team. All entries must be submitted before
                            the official deadline.
                        </p>
                    </div>
                </div>

                <!-- Step 5 -->
                <div class="nom-timeline-step" data-step="5">
                    <div class="nom-step-marker">
                        <div class="nom-marker-circle">
                            <span class="nom-marker-number">5</span>
                        </div>
                        <div class="nom-step-line"></div>
                    </div>
                    <div class="nom-step-card">
                        <div class="nom-card-glow-effect"></div>
                        <div class="nom-step-icon-wrapper">
                            <i class="fas fa-balance-scale nom-step-icon-large"></i>
                        </div>
                        <h3 class="nom-step-card-title">Evaluation by the Jury Panel</h3>
                        <p class="nom-step-card-text">
                            Nominations will be reviewed by our independent panel of industry experts and leaders.
                            Judging is based on:
                        </p>
                        <ul class="nom-step-checklist">
                            <li><i class="fas fa-star"></i> Innovation & originality</li>
                            <li><i class="fas fa-star"></i> Measurable impact</li>
                            <li><i class="fas fa-star"></i> Quality and scalability of the work</li>
                            <li><i class="fas fa-star"></i> Alignment with the values of the ORIONSM International Tech
                                Awards</li>
                        </ul>
                    </div>
                </div>

                <!-- Step 6 -->
                <div class="nom-timeline-step" data-step="6">
                    <div class="nom-step-marker">
                        <div class="nom-marker-circle nom-marker-final">
                            <i class="fas fa-trophy"></i>
                        </div>
                    </div>
                    <div class="nom-step-card nom-step-card-final">
                        <div class="nom-card-glow-effect"></div>
                        <div class="nom-step-icon-wrapper">
                            <i class="fas fa-award nom-step-icon-large"></i>
                        </div>
                        <h3 class="nom-step-card-title">Results & Recognition</h3>
                        <p class="nom-step-card-text">
                            Final results will be shared via email and officially announced on our website.
                            Winners will receive:
                        </p>
                        <ul class="nom-step-checklist">
                            <li><i class="fas fa-certificate"></i> Digital certificate of recognition</li>
                            <li><i class="fas fa-star"></i> Featured listing on the ORIONSM International Tech Awards
                                platform</li>
                            <li><i class="fas fa-trophy"></i> Eligibility to purchase the official ORIONSM Trophy
                                (optional)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Trophy Purchase CTA -->
            <div class="nom-trophy-cta">
                <div class="nom-trophy-cta-glow"></div>
                <div class="nom-trophy-cta-content">
                    <div class="nom-trophy-cta-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3 class="nom-trophy-cta-title">Trophy Purchase</h3>
                    <p class="nom-trophy-cta-text">
                        Winners may opt to order the <strong>official ORIONSM Trophy</strong>, a premium handcrafted
                        symbol
                        of their recognition. This step is completely optional and is offered to commemorate your
                        achievement
                        in a tangible, timeless way.
                    </p>
                    <a href="#" class="nom-trophy-cta-button">
                        <span>Learn More About the Trophy</span>
                        <span class="nom-button-shine-effect"></span>
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Important Dates Section - Premium Design -->
    <section class="nom-important-dates-premium">
        <div class="container">
            <div class="nom-dates-header">
                <div class="nom-dates-decoration">
                    <span class="nom-dates-line"></span>
                    <i class="fas fa-calendar-alt nom-dates-icon"></i>
                    <span class="nom-dates-line"></span>
                </div>
                <h2 class="nom-dates-main-title">
                    Important <span class="nom-dates-highlight">Dates</span>
                </h2>
                <p class="nom-dates-subtitle">Mark your calendar for these key milestones</p>
            </div>

            <div class="nom-dates-grid">
                <!-- Date Card 1 -->
                <div class="nom-date-card">
                    <div class="nom-date-card-glow"></div>
                    <div class="nom-date-icon-wrapper">
                        <i class="fas fa-inbox nom-date-icon"></i>
                    </div>
                    <h3 class="nom-date-card-title">Application Intake</h3>
                    <div class="nom-date-value">2025-06-20</div>
                    <div class="nom-date-label">Submissions Open</div>
                </div>

                <!-- Date Card 2 -->
                <div class="nom-date-card">
                    <div class="nom-date-card-glow"></div>
                    <div class="nom-date-icon-wrapper">
                        <i class="fas fa-sync-alt nom-date-icon"></i>
                    </div>
                    <h3 class="nom-date-card-title">Cut-off Cycle</h3>
                    <div class="nom-date-value">2025-09-03</div>
                    <div class="nom-date-label">Final Submission Date</div>
                </div>

                <!-- Date Card 3 -->
                <div class="nom-date-card">
                    <div class="nom-date-card-glow"></div>
                    <div class="nom-date-icon-wrapper">
                        <i class="fas fa-lightbulb nom-date-icon"></i>
                    </div>
                    <h3 class="nom-date-card-title">Prestige Spotlight</h3>
                    <div class="nom-date-value">2025-09-17</div>
                    <div class="nom-date-label">Winners Announcement</div>
                </div>

                <!-- Date Card 4 -->
                <div class="nom-date-card">
                    <div class="nom-date-card-glow"></div>
                    <div class="nom-date-icon-wrapper">
                        <i class="fas fa-trophy nom-date-icon"></i>
                    </div>
                    <h3 class="nom-date-card-title">Trophy Reservation Phase</h3>
                    <div class="nom-date-value">TBA</div>
                    <div class="nom-date-label">Order Window Opens</div>
                </div>

                <!-- Date Card 5 -->
                <div class="nom-date-card">
                    <div class="nom-date-card-glow"></div>
                    <div class="nom-date-icon-wrapper">
                        <i class="fas fa-hourglass-end nom-date-icon"></i>
                    </div>
                    <h3 class="nom-date-card-title">Trophy Closure Deadline</h3>
                    <div class="nom-date-value">TBA</div>
                    <div class="nom-date-label">Final Order Date</div>
                </div>
            </div>

            <!-- Countdown Notice -->
            <div class="nom-countdown-notice">
                <div class="nom-notice-glow"></div>
                <i class="fas fa-exclamation-circle nom-notice-icon"></i>
                <p class="nom-notice-text">
                    <strong>Don't miss out!</strong> All submissions must be received before the cut-off date.
                    Late entries will not be considered.
                </p>
            </div>
        </div>
    </section>
@endsection
