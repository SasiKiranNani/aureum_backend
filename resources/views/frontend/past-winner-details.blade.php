@extends('layouts.frontend.index')

@section('contents')
    <!-- Past Winner Details Section -->
    <section class="past-winner-details-section">
        <div class="container">
            <div class="winner-profile-card">
                <!-- Winner Image Header -->
                <div class="winner-image-header">
                    <img src="divya-images/about.jpg" alt="Anders Holm" class="winner-detail-photo">
                    <div class="winner-badge-overlay">
                        <div class="winner-year-badge">2025 WINNER</div>
                    </div>
                </div>

                <!-- Winner Content -->
                <div class="winner-content-body">
                    <!-- Winner Header -->
                    <div class="winner-detail-header">
                        <h1 class="winner-detail-name">Anders Holm</h1>
                        <p class="winner-detail-subtitle">Sustainable Tech Impact Award Winner</p>
                        <div class="winner-category-tag">TRANSPORTATION & MOBILITY</div>
                    </div>

                    <!-- Winner Stats -->
                    <div class="winner-stats-grid">
                        <div class="stat-item">
                            <i class="fas fa-trophy"></i>
                            <div class="stat-content">
                                <div class="stat-value">Platinum</div>
                                <div class="stat-label">Badge Level</div>
                            </div>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-calendar"></i>
                            <div class="stat-content">
                                <div class="stat-value">Season 2</div>
                                <div class="stat-label">Competition</div>
                            </div>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="stat-content">
                                <div class="stat-value">Finland</div>
                                <div class="stat-label">Country</div>
                            </div>
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-medal"></i>
                            <div class="stat-content">
                                <div class="stat-value">2025</div>
                                <div class="stat-label">Award Year</div>
                            </div>
                        </div>
                    </div>

                    <!-- Winner Story -->
                    <div class="winner-story-section">
                        <h2 class="story-title">Achievement Story</h2>
                        <div class="story-divider"></div>
                        <p class="story-text">
                            Anders Holm revolutionized sustainable transportation through groundbreaking innovations
                            that have transformed
                            the mobility industry. His visionary approach to integrating clean technology with
                            practical transportation
                            solutions has set new standards for environmental responsibility in the sector.
                        </p>
                        <p class="story-text">
                            Through his leadership, he has successfully implemented large-scale green transportation
                            initiatives across
                            multiple countries, reducing carbon emissions by over 40% while improving efficiency and
                            user experience.
                            His work demonstrates that sustainability and profitability can coexist harmoniously.
                        </p>
                    </div>

                    <!-- Project Impact -->
                    <div class="project-impact-section">
                        <h3 class="impact-title"><i class="fas fa-chart-line"></i> Project Impact</h3>
                        <div class="impact-grid">
                            <div class="impact-card">
                                <div class="impact-number">40%</div>
                                <div class="impact-description">Emission Reduction</div>
                            </div>
                            <div class="impact-card">
                                <div class="impact-number">15+</div>
                                <div class="impact-description">Countries Reached</div>
                            </div>
                            <div class="impact-card">
                                <div class="impact-number">200K+</div>
                                <div class="impact-description">Users Impacted</div>
                            </div>
                        </div>
                    </div>

                    <!-- Winner Quote -->
                    <div class="winner-quote">
                        <i class="fas fa-quote-left quote-icon"></i>
                        <p class="quote-text">
                            "Innovation in sustainability is not just about technology—it's about creating lasting
                            impact that benefits
                            both people and the planet. This award represents years of dedication to that vision."
                        </p>
                        <div class="quote-author">— Anders Holm</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
