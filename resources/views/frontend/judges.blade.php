@extends('layouts.frontend.index')

@section('contents')
    <!-- Judges Section - Premium Design -->
    <section class="judges-premium">
        <!-- Hero Header -->
        <div class="container">
            <div class="judges-hero-header">
                <div class="judges-decoration">
                    <span class="judges-line"></span>
                    <i class="fas fa-users judges-icon"></i>
                    <span class="judges-line"></span>
                </div>
                <h1 class="judges-main-title">
                    Our <span class="judges-highlight">Judges</span>
                </h1>
                <p class="judges-subtitle">
                    Meet the distinguished panel of industry experts evaluating this year's submissions
                </p>
            </div>

            <!-- Judges Grid -->
            <div class="judges-grid">
                <!-- Judge Card 1 -->
                <div class="judge-card">
                    <div class="judge-image-wrapper">
                        <div class="judge-level-badge">LEVEL 1</div>
                        <img src="divya-images/about.jpg" alt="Anna Kya" class="judge-photo">
                        <div class="judge-overlay"></div>
                    </div>
                    <div class="judge-info">
                        <h3 class="judge-name">Anna Kya</h3>
                        <p class="judge-title">CEO & COO</p>
                    </div>
                </div>

                <!-- Judge Card 2 -->
                <div class="judge-card">
                    <div class="judge-image-wrapper">
                        <div class="judge-level-badge">LEVEL 1</div>
                        <img src="divya-images/about.jpg" alt="Des Ronald" class="judge-photo">
                        <div class="judge-overlay"></div>
                    </div>
                    <div class="judge-info">
                        <h3 class="judge-name">Des Ronald</h3>
                        <p class="judge-title">Director of AI Strategy & Technology Board Member</p>
                    </div>
                </div>

                <!-- Judge Card 3 -->
                <div class="judge-card">
                    <div class="judge-image-wrapper">
                        <div class="judge-level-badge">LEVEL 1</div>
                        <img src="divya-images/about.jpg" alt="Gilbert" class="judge-photo">
                        <div class="judge-overlay"></div>
                    </div>
                    <div class="judge-info">
                        <h3 class="judge-name">Gilbert</h3>
                        <p class="judge-title">CEO & Digital Commerce & Innovation</p>
                    </div>
                </div>

                <!-- Judge Card 4 -->
                <div class="judge-card">
                    <div class="judge-image-wrapper">
                        <div class="judge-level-badge">LEVEL 1</div>
                        <img src="divya-images/about.jpg" alt="Japnith Kaur" class="judge-photo">
                        <div class="judge-overlay"></div>
                    </div>
                    <div class="judge-info">
                        <h3 class="judge-name">Japnith Kaur</h3>
                        <p class="judge-title">CTO & Technology Advisor</p>
                    </div>
                </div>

                <!-- Judge Card 5 -->
                <div class="judge-card">
                    <div class="judge-image-wrapper">
                        <div class="judge-level-badge">LEVEL 1</div>
                        <img src="divya-images/about.jpg" alt="Joey Wong" class="judge-photo">
                        <div class="judge-overlay"></div>
                    </div>
                    <div class="judge-info">
                        <h3 class="judge-name">Joey Wong</h3>
                        <p class="judge-title">Director of Technology Jury Member</p>
                    </div>
                </div>

                <!-- Judge Card 6 -->
                <div class="judge-card">
                    <div class="judge-image-wrapper">
                        <div class="judge-level-badge">LEVEL 1</div>
                        <img src="divya-images/about.jpg" alt="Karen Price" class="judge-photo">
                        <div class="judge-overlay"></div>
                    </div>
                    <div class="judge-info">
                        <h3 class="judge-name">Karen Price</h3>
                        <p class="judge-title">CEO & Global Business Tech Evaluator</p>
                    </div>
                </div>

                <!-- Judge Card 7 -->
                <div class="judge-card">
                    <div class="judge-image-wrapper">
                        <div class="judge-level-badge">LEVEL 1</div>
                        <img src="divya-images/about.jpg" alt="Mitcheel" class="judge-photo">
                        <div class="judge-overlay"></div>
                    </div>
                    <div class="judge-info">
                        <h3 class="judge-name">Mitcheel</h3>
                        <p class="judge-title">CTO & Technology Advisor</p>
                    </div>
                </div>

                <!-- Judge Card 8 -->
                <div class="judge-card">
                    <div class="judge-image-wrapper">
                        <div class="judge-level-badge">LEVEL 1</div>
                        <img src="divya-images/about.jpg" alt="Neil Capel" class="judge-photo">
                        <div class="judge-overlay"></div>
                    </div>
                    <div class="judge-info">
                        <h3 class="judge-name">Neil Capel</h3>
                        <p class="judge-title">CEO & Strategic Innovation Advisor</p>
                    </div>
                </div>

                <!-- Judge Card 9 -->
                <div class="judge-card">
                    <div class="judge-image-wrapper">
                        <div class="judge-level-badge">LEVEL 1</div>
                        <img src="divya-images/about.jpg" alt="Sarah Smith" class="judge-photo">
                        <div class="judge-overlay"></div>
                    </div>
                    <div class="judge-info">
                        <h3 class="judge-name">Sarah Smith</h3>
                        <p class="judge-title">Director & Global Innovation Jury Member</p>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="judges-pagination">
                <button class="pagination-btn prev-btn" disabled>
                    <i class="fas fa-chevron-left"></i>
                    <span>Previous</span>
                </button>
                <div class="pagination-numbers">
                    <button class="page-number active">1</button>
                    <button class="page-number">Next</button>
                </div>
                <button class="pagination-btn next-btn">
                    <span>Next</span>
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </section>

    <!-- Judges Content-Only Section -->
    <section class="judges-content-section">
        <div class="container">
            <div class="content-header">
                <h2 class="content-section-title">
                    Additional <span class="title-highlight">Panel Members</span>
                </h2>
                <p class="content-section-desc">
                    Extended list of industry experts contributing to the evaluation process
                </p>
            </div>

            <div class="judges-content-grid">
                <!-- Content Card 1 -->
                <div class="judge-content-card">
                    <div class="content-badge">LEVEL 2</div>
                    <h3 class="content-judge-name">Dr. Michael Anderson</h3>
                    <p class="content-judge-title">Chief Innovation Officer & AI Research Lead</p>
                    <p class="content-judge-specialty">Specialization: Machine Learning, Neural Networks</p>
                    <p class="content-judge-bio">
                        15+ years of experience in artificial intelligence research and implementation.
                        Published author of groundbreaking papers in deep learning architectures.
                    </p>
                </div>

                <!-- Content Card 2 -->
                <div class="judge-content-card">
                    <div class="content-badge">LEVEL 2</div>
                    <h3 class="content-judge-name">Sarah Chen</h3>
                    <p class="content-judge-title">VP of Product Innovation & UX Strategy</p>
                    <p class="content-judge-specialty">Specialization: User Experience, Design Thinking</p>
                    <p class="content-judge-bio">
                        Award-winning product designer with expertise in creating intuitive digital experiences.
                        Led design teams at Fortune 500 companies.
                    </p>
                </div>

                <!-- Content Card 3 -->
                <div class="judge-content-card">
                    <div class="content-badge">LEVEL 2</div>
                    <h3 class="content-judge-name">Prof. James Rodriguez</h3>
                    <p class="content-judge-title">Academic Director & Technology Ethics Scholar</p>
                    <p class="content-judge-specialty">Specialization: Tech Ethics, Data Privacy</p>
                    <p class="content-judge-bio">
                        Leading voice in technology ethics and responsible AI development.
                        Advisor to international policy-making bodies on digital governance.
                    </p>
                </div>

                <!-- Content Card 4 -->
                <div class="judge-content-card">
                    <div class="content-badge">LEVEL 2</div>
                    <h3 class="content-judge-name">Emily Thompson</h3>
                    <p class="content-judge-title">Venture Capitalist & Startup Ecosystem Builder</p>
                    <p class="content-judge-specialty">Specialization: Investment Strategy, Scaling</p>
                    <p class="content-judge-bio">
                        Invested in 50+ successful tech startups. Expert in identifying disruptive
                        innovations and guiding companies through rapid growth phases.
                    </p>
                </div>

                <!-- Content Card 5 -->
                <div class="judge-content-card">
                    <div class="content-badge">LEVEL 3</div>
                    <h3 class="content-judge-name">David Kim</h3>
                    <p class="content-judge-title">Blockchain Architect & Decentralization Expert</p>
                    <p class="content-judge-specialty">Specialization: Blockchain, Web3, DeFi</p>
                    <p class="content-judge-bio">
                        Pioneer in blockchain technology with contributions to major cryptocurrency protocols.
                        Advocate for decentralized systems and digital sovereignty.
                    </p>
                </div>

                <!-- Content Card 6 -->
                <div class="judge-content-card">
                    <div class="content-badge">LEVEL 3</div>
                    <h3 class="content-judge-name">Dr. Priya Sharma</h3>
                    <p class="content-judge-title">Cybersecurity Director & Threat Intelligence Lead</p>
                    <p class="content-judge-specialty">Specialization: Security, Risk Management</p>
                    <p class="content-judge-bio">
                        Global authority on cybersecurity with expertise in protecting critical infrastructure.
                        Regular speaker at international security conferences.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection
