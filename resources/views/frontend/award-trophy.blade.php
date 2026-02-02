@extends('layouts.frontend.index')

@section('contents')
    <!-- Trophy Section - Premium Design -->
    <section class="trophy-section-premium">
        <!-- Animated Background Effects -->
        <div class="trophy-bg-effects">
            <div class="trophy-gradient-overlay"></div>
            <div class="trophy-orbs">
                <div class="trophy-orb orb-gold-1"></div>
                <div class="trophy-orb orb-gold-2"></div>
                <div class="trophy-orb orb-blue-1"></div>
            </div>
        </div>

        <!-- Hero Header Section -->
        <div class="trophy-hero-section">
            <div class="container">
                <div class="trophy-hero-header">
                    <div class="hero-decoration">
                        <span class="hero-line"></span>
                        <i class="fas fa-trophy hero-trophy-icon"></i>
                        <span class="hero-line"></span>
                    </div>
                    <h1 class="trophy-main-title">
                        The <span class="title-highlight">ORIONSM</span> Trophy
                    </h1>
                    <p class="trophy-main-subtitle">More Than a Trophy — A Legacy of Excellence</p>
                </div>
            </div>
        </div>

        <!-- Story Section -->
        <div class="container">
            <div class="trophy-story-section">
                <div class="story-card">
                    <div class="story-glow"></div>
                    <div class="story-content">
                        <p class="story-lead">
                            The <strong class="gold-text">ORIONSM Trophy</strong> is not just a symbol of victory. It
                            is a celebration of
                            courage, creativity, and relentless innovation. Crafted to reflect the golden standard
                            of achievement,
                            it honours those who have not only excelled — but redefined what's possible in
                            technology, business,
                            and innovation.
                        </p>
                        <ul class="story-list">
                            <li>
                                <i class="fas fa-check-circle list-icon"></i>
                                <span>This is not for the status quo.</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle list-icon"></i>
                                <span>This is for the disruptors, the builders, the visionaries.</span>
                            </li>
                            <li>
                                <i class="fas fa-check-circle list-icon"></i>
                                <span>This is for <strong>you</strong>.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Trophy Showcase Section -->
            <div class="trophy-showcase">
                <div class="row align-items-center">
                    <!-- Trophy Image Column -->
                    <div class="col-lg-6">
                        <div class="trophy-image-wrapper">
                            <div class="image-glow-effect"></div>
                            <div class="trophy-image-container">
                                <img src="{{ asset('frontend/images/about.jpg') }}" alt="Prestigious ORIONSM Award Trophy"
                                    class="trophy-img">
                                <div class="image-shine"></div>
                            </div>
                            <div class="floating-badge">
                                <i class="fas fa-award"></i>
                                <span>Premium Quality</span>
                            </div>
                        </div>
                    </div>

                    <!-- Trophy Details Column -->
                    <div class="col-lg-6">
                        <div class="trophy-details-wrapper">
                            <h2 class="details-title">The ORIONSM Trophy</h2>

                            <!-- Detail Card 1 -->
                            <div class="detail-card">
                                <div class="detail-icon-wrapper">
                                    <i class="fas fa-crown detail-icon"></i>
                                </div>
                                <div class="detail-content">
                                    <h3 class="detail-heading">A Symbol of Timeless Innovation</h3>
                                    <p class="detail-text">
                                        The ORIONSM Trophy is the physical embodiment of excellence in technology and
                                        design.
                                        It stands as a tribute to visionaries who push boundaries, shape the future,
                                        and define what's next.
                                    </p>
                                </div>
                            </div>

                            <!-- Detail Card 2 -->
                            <div class="detail-card">
                                <div class="detail-icon-wrapper">
                                    <i class="fas fa-gift detail-icon"></i>
                                </div>
                                <div class="detail-content">
                                    <h3 class="detail-heading">How to Get Yours</h3>
                                    <p class="detail-text">
                                        As a verified ORIONSM Award recipient, you are eligible to <strong>purchase
                                            the official trophy</strong>.
                                        This helps us maintain the highest standards of design, production, and
                                        global delivery.
                                    </p>
                                </div>
                            </div>

                            <!-- Pricing Card -->
                            <div class="pricing-card">
                                <div class="pricing-glow"></div>
                                <div class="pricing-content">
                                    <div class="price-header">
                                        <i class="fas fa-star price-icon"></i>
                                        <span class="price-label">Trophy Price</span>
                                    </div>
                                    <div class="price-amount">
                                        $<span class="amount-value">Insert Amount</span> USD
                                    </div>
                                    <a href="#" class="order-trophy-btn">
                                        <span class="btn-text">Order Your Trophy</span>
                                        <span class="btn-shine-effect"></span>
                                        <i class="fas fa-shopping-cart btn-icon"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
