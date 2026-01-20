@extends('layouts.frontend.index')

@section('contents')
    <!-- Judging Criteria Main Section -->
    <section class="judging-criteria-premium">
        <!-- Hero Header -->
        <div class="criteria-hero">
            <div class="container">
                <div class="criteria-hero-header">
                    <div class="criteria-decoration">
                        <span class="criteria-line"></span>
                        <i class="fas fa-gavel criteria-icon"></i>
                        <span class="criteria-line"></span>
                    </div>
                    <h1 class="criteria-main-title">
                        Judging <span class="criteria-highlight">Criteria</span>
                    </h1>
                    <p class="criteria-subtitle">
                        A Fair, Rigorous Process That Rewards True Excellence in Technology and Innovation
                    </p>
                </div>
            </div>
        </div>

        <!-- Evaluation Framework Section -->
        <div class="container">
            <div class="framework-section">
                <div class="section-header-center">
                    <h2 class="section-title-gold">Evaluation Framework</h2>
                    <p class="section-desc">
                        We use a multi-category and multi-stage assessment system to ensure a rigorous,transparent,
                        and meritocratic selection process for recipients of The Gold Standard Award. Our judging
                        framework is designed to identify and celebrate excellence in innovation, leadership, and
                        social impact across various fields.
                    </p>
                </div>
            </div>

            <!-- Parameters for Integrity Section -->
            <div class="parameters-section">
                <div class="section-header-center">
                    <h2 class="section-title-gold">Parameters for Integrity</h2>
                    <p class="section-desc">
                        Every submission undergoes a thorough evaluation across the following key criteria:
                    </p>
                </div>

                <div class="parameters-grid">
                    <!-- Level 1 -->
                    <div class="parameter-card">
                        <div class="param-level">Level 1</div>
                        <h3 class="param-title">Initial Screening</h3>
                        <p class="param-desc">Basic eligibility and completeness check.</p>
                    </div>

                    <!-- Level 2 -->
                    <div class="parameter-card">
                        <div class="param-level">Level 2</div>
                        <h3 class="param-title">Detailed Review</h3>
                        <p class="param-desc">Evaluation of merit, innovation, and relevance.</p>
                    </div>

                    <!-- Level 3 -->
                    <div class="parameter-card">
                        <div class="param-level">Level 3</div>
                        <h3 class="param-title">Expert Assessment</h3>
                        <p class="param-desc">In-depth review by subject matter experts and judges.</p>
                    </div>

                    <!-- Level 4 -->
                    <div class="parameter-card">
                        <div class="param-level">Level 4</div>
                        <h3 class="param-title">Final Deliberation</h3>
                        <p class="param-desc">Final round and winner selection.</p>
                    </div>
                </div>
            </div>

            <!-- Innovation Impact Metrics -->
            <div class="impact-metrics-section">
                <div class="section-header-center">
                    <h2 class="section-title-gold">Innovation Impact Metrics</h2>
                </div>

                <div class="metrics-list">
                    <div class="metric-item">
                        <div class="metric-number">1</div>
                        <div class="metric-content">
                            <h4>Originality and Creativity</h4>
                            <p>How novel and unique is the submission? Does it offer fresh perspectives or
                                groundbreaking ideas?</p>
                        </div>
                    </div>

                    <div class="metric-item">
                        <div class="metric-number">2</div>
                        <div class="metric-content">
                            <h4>Impact and Relevance</h4>
                            <p>What measurable impact has the work had? Does it address a significant problem or
                                opportunity?</p>
                        </div>
                    </div>

                    <div class="metric-item">
                        <div class="metric-number">3</div>
                        <div class="metric-content">
                            <h4>Scalability and Sustainability</h4>
                            <p>Can the innovation be scaled or replicated? Does it have long-term viability?</p>
                        </div>
                    </div>

                    <div class="metric-item">
                        <div class="metric-number">4</div>
                        <div class="metric-content">
                            <h4>Quality of Execution</h4>
                            <p>How well was the project implemented? Does it meet industry standards or exceed them?
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submission and Verification Process -->
            <div class="verification-section">
                <div class="section-header-center">
                    <h2 class="section-title-gold">Submission and Verification Process</h2>
                </div>

                <div class="verification-grid">
                    <div class="verification-card">
                        <div class="verify-icon-wrapper">
                            <i class="fas fa-shield-alt verify-icon"></i>
                        </div>
                        <h4>Authenticity Screening</h4>
                        <p>All submissions are verified for authenticity and accuracy.</p>
                    </div>

                    <div class="verification-card">
                        <div class="verify-icon-wrapper">
                            <i class="fas fa-search verify-icon"></i>
                        </div>
                        <h4>Due diligence conducted on all entries</h4>
                        <p>Comprehensive background checks and fact verification.</p>
                    </div>

                    <div class="verification-card">
                        <div class="verify-icon-wrapper">
                            <i class="fas fa-check-double verify-icon"></i>
                        </div>
                        <h4>Cross-verification</h4>
                        <p>Claims and achievements are cross-checked with multiple sources.</p>
                    </div>

                    <div class="verification-card">
                        <div class="verify-icon-wrapper">
                            <i class="fas fa-user-shield verify-icon"></i>
                        </div>
                        <h4>Ethical Compliance</h4>
                        <p>Ensuring all work meets ethical standards and guidelines.</p>
                    </div>
                </div>
            </div>

            <!-- Scoring Methodology -->
            <div class="scoring-section">
                <div class="section-header-center">
                    <h2 class="section-title-gold">Scoring Methodology</h2>
                </div>

                <div class="scoring-cards-grid">
                    <div class="scoring-card">
                        <div class="scoring-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Weighted Criteria</h3>
                        <p>Each parameter carries specific weight based on importance and relevance to ensure a
                            balanced final score.</p>
                    </div>

                    <div class="scoring-card">
                        <div class="scoring-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Multi-Judge Panel</h3>
                        <p>Independent evaluations from multiple judges prevent bias and ensure diverse perspectives
                            are considered.</p>
                    </div>

                    <div class="scoring-card">
                        <div class="scoring-icon">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <h3>Aggregate Scoring</h3>
                        <p>Final scores are aggregated from all judges to ensure fairness, accuracy, and objectivity
                            in selection.</p>
                    </div>
                </div>
            </div>

            <!-- Multiple-tiered Evaluation Rounds -->
            <div class="evaluation-rounds-section">
                <div class="section-header-center">
                    <h2 class="section-title-gold">Multiple-tiered Evaluation Rounds</h2>
                </div>

                <p class="rounds-intro">
                    Each submission passes through several rounds of evaluation for comprehensive assessment:
                </p>

                <div class="rounds-timeline">
                    <div class="round-item">
                        <div class="round-marker">
                            <div class="round-dot"></div>
                            <div class="round-line"></div>
                        </div>
                        <div class="round-content">
                            <h4>Preliminary Scoring</h4>
                            <p>Basic criterion met or not met</p>
                        </div>
                    </div>

                    <div class="round-item">
                        <div class="round-marker">
                            <div class="round-dot"></div>
                            <div class="round-line"></div>
                        </div>
                        <div class="round-content">
                            <h4>Quantitative Analysis</h4>
                            <p>Measured impact using data metrics</p>
                        </div>
                    </div>

                    <div class="round-item">
                        <div class="round-marker">
                            <div class="round-dot"></div>
                            <div class="round-line"></div>
                        </div>
                        <div class="round-content">
                            <h4>Qualitative Assessment</h4>
                            <p>Subjective evaluation on innovation and presentation</p>
                        </div>
                    </div>

                    <div class="round-item">
                        <div class="round-marker">
                            <div class="round-dot final-dot"></div>
                        </div>
                        <div class="round-content">
                            <h4>Final Consensus Discussion</h4>
                            <p>Deliberation among judges for final winners</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ensuring Objectivity and Fairness -->
            <div class="objectivity-section">
                <div class="section-header-center">
                    <h2 class="section-title-gold">Ensuring Objectivity and Fairness</h2>
                </div>

                <div class="objectivity-card">
                    <p class="objectivity-text">
                        All submissions are anonymized during the early stages of evaluation to prevent bias. Judges
                        are required to disclose conflicts of interest. Our rubric ensures consistency across all
                        entries.
                    </p>
                </div>
            </div>

            <!-- Verification of Results -->
            <div class="results-verification-section">
                <div class="section-header-center">
                    <h2 class="section-title-gold">Verification of Results</h2>
                </div>

                <div class="results-verification-card">
                    <p class="verification-text">
                        Winners are notified confidentially and results are cross-verified before the official
                        announcement to ensure absolute integrity and transparency.
                    </p>
                    <div class="verification-badge">
                        <i class="fas fa-certificate"></i>
                        <span>Verified Excellence</span>
                    </div>
                </div>
            </div>

            <!-- Commitment to Excellence -->
            <div class="commitment-section">
                <div class="section-header-center">
                    <h2 class="section-title-gold">Commitment to Excellence</h2>
                </div>

                <div class="commitment-card">
                    <p class="commitment-text">
                        Our Judging Process is designed with integrity, meritocracy, and objectivity in mind. We are
                        committed to recognizing the best in innovation, and we continuously refine our methods to
                        serve the global community better.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
