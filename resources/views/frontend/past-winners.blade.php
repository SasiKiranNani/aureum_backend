@extends('layouts.frontend.index')

@section('contents')
    <!-- Past Winners Archive Section -->
    <section class="past-winners-archive">
        <div class="container">
            <!-- Hero Header -->
            <div class="archive-hero-header">
                <h1 class="archive-main-title">Past Winners Archive</h1>
                <p class="archive-subtitle">
                    Celebrating excellence in technology innovation and leadership
                </p>
            </div>

            <!-- Search and Filters -->
            <div class="winners-filters">
                <div class="filter-search">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" class="search-input" placeholder="Type to search...">
                </div>
                <div class="filter-group">
                    <select class="filter-select">
                        <option>Filter by Year</option>
                        <option selected>2025</option>
                        <option>2024</option>
                        <option>2023</option>
                    </select>
                </div>
                <div class="filter-group">
                    <select class="filter-select">
                        <option selected>Filter by Season</option>
                        <option>Season 1</option>
                        <option>Season 2</option>
                    </select>
                </div>
                <div class="filter-group">
                    <select class="filter-select">
                        <option selected>Filter by Badge</option>
                        <option>Platinum</option>
                        <option>Gold</option>
                        <option>Diamond</option>
                    </select>
                </div>
                <div class="filter-group">
                    <select class="filter-select">
                        <option selected>Filter by Category</option>
                        <option>AI Impact</option>
                        <option>Data Analytics</option>
                        <option>EdTech</option>
                    </select>
                </div>
            </div>

            <!-- Winners Grid -->
            <div class="winners-grid">
                <!-- Winner Card 1 -->
                <div class="winner-card">
                    <div class="winner-rank-badge">1</div>
                    <div class="winner-content">
                        <h3 class="winner-name">Anders Holm</h3>
                        <p class="winner-award"><i class="fas fa-trophy"></i> Award: Sustainable Tech Impact Award
                        </p>
                        <p class="winner-category"><i class="fas fa-layer-group"></i> Category: TRANSPORTATION &
                            MOBILITY</p>
                        <p class="winner-info"><i class="fas fa-calendar"></i> Season: Season 2</p>
                        <p class="winner-info"><i class="fas fa-globe"></i> Country: Finland</p>
                        <p class="winner-info"><i class="fas fa-medal"></i> Badge: Platinum</p>
                    </div>
                    <div class="winner-status-badge">
                        <i class="fas fa-trophy"></i> WINNER
                        <span class="winner-year">2025</span>
                    </div>
                </div>

                <!-- Winner Card 2 -->
                <div class="winner-card">
                    <div class="winner-rank-badge">1</div>
                    <div class="winner-content">
                        <h3 class="winner-name">Nagerjuna Gummadi</h3>
                        <p class="winner-award"><i class="fas fa-trophy"></i> Award: Data Analytics Excellence Award
                        </p>
                        <p class="winner-category"><i class="fas fa-layer-group"></i> Category: DATA ANALYTICS & BIG
                            DATA</p>
                        <p class="winner-info"><i class="fas fa-calendar"></i> Season: 2025-S2</p>
                        <p class="winner-info"><i class="fas fa-globe"></i> Country: US</p>
                        <p class="winner-info"><i class="fas fa-medal"></i> Badge: Gold</p>
                    </div>
                    <div class="winner-status-badge">
                        <i class="fas fa-trophy"></i> WINNER
                        <span class="winner-year">2025</span>
                    </div>
                </div>

                <!-- Winner Card 3 -->
                <div class="winner-card">
                    <div class="winner-rank-badge">1</div>
                    <div class="winner-content">
                        <h3 class="winner-name">Viktoria Knee</h3>
                        <p class="winner-award"><i class="fas fa-trophy"></i> Award: Supply Chain Impact Award</p>
                        <p class="winner-category"><i class="fas fa-layer-group"></i> Category: LOGISTICS &
                            AUTOMATION</p>
                        <p class="winner-info"><i class="fas fa-calendar"></i> Season: Season 2</p>
                        <p class="winner-info"><i class="fas fa-globe"></i> Country: Germany</p>
                        <p class="winner-info"><i class="fas fa-medal"></i> Badge: Platinum</p>
                    </div>
                    <div class="winner-status-badge">
                        <i class="fas fa-trophy"></i> WINNER
                        <span class="winner-year">2025</span>
                    </div>
                </div>

                <!-- Winner Card 4 -->
                <div class="winner-card">
                    <div class="winner-rank-badge">1</div>
                    <div class="winner-content">
                        <h3 class="winner-name">Jenn Graham</h3>
                        <p class="winner-award"><i class="fas fa-trophy"></i> Award: EdTech Innovation Award</p>
                        <p class="winner-category"><i class="fas fa-layer-group"></i> Category: EDUCATION & FINTECH
                        </p>
                        <p class="winner-info"><i class="fas fa-calendar"></i> Season: Season 1</p>
                        <p class="winner-info"><i class="fas fa-globe"></i> Country: UK</p>
                        <p class="winner-info"><i class="fas fa-medal"></i> Badge: Gold</p>
                    </div>
                    <div class="winner-status-badge">
                        <i class="fas fa-trophy"></i> WINNER
                        <span class="winner-year">2025</span>
                    </div>
                </div>

                <!-- Winner Card 5 -->
                <div class="winner-card">
                    <div class="winner-rank-badge">1</div>
                    <div class="winner-content">
                        <h3 class="winner-name">Streeva</h3>
                        <p class="winner-award"><i class="fas fa-trophy"></i> Award: AI Impact Award</p>
                        <p class="winner-category"><i class="fas fa-layer-group"></i> Category: ARTIFICIAL
                            INTELLIGENCE & MACHINE LEARNING</p>
                        <p class="winner-info"><i class="fas fa-calendar"></i> Season: Season 1</p>
                        <p class="winner-info"><i class="fas fa-globe"></i> Country: Belgium</p>
                        <p class="winner-info"><i class="fas fa-medal"></i> Badge: Platinum</p>
                    </div>
                    <div class="winner-status-badge">
                        <i class="fas fa-trophy"></i> WINNER
                        <span class="winner-year">2025</span>
                    </div>
                </div>

                <!-- Winner Card 6 -->
                <div class="winner-card">
                    <div class="winner-rank-badge">1</div>
                    <div class="winner-content">
                        <h3 class="winner-name">Eleanor Whitmore</h3>
                        <p class="winner-award"><i class="fas fa-trophy"></i> Award: IoT Impact Award</p>
                        <p class="winner-category"><i class="fas fa-layer-group"></i> Category: INTERNET OF THINGS &
                            SMART</p>
                        <p class="winner-info"><i class="fas fa-calendar"></i> Season: Season 2</p>
                        <p class="winner-info"><i class="fas fa-globe"></i> Country: Sweden</p>
                        <p class="winner-info"><i class="fas fa-medal"></i> Badge: Diamond</p>
                    </div>
                    <div class="winner-status-badge">
                        <i class="fas fa-trophy"></i> WINNER
                        <span class="winner-year">2025</span>
                    </div>
                </div>

                <!-- Winner Card 7 -->
                <div class="winner-card">
                    <div class="winner-rank-badge">1</div>
                    <div class="winner-content">
                        <h3 class="winner-name">Bhaskardeep Khaund</h3>
                        <p class="winner-award"><i class="fas fa-trophy"></i> Award: Cybersecurity Excellence Award
                        </p>
                        <p class="winner-category"><i class="fas fa-layer-group"></i> Category: CYBERSECURITY & DATA
                            PROTECTION</p>
                        <p class="winner-info"><i class="fas fa-calendar"></i> Season: 2025-S2</p>
                        <p class="winner-info"><i class="fas fa-globe"></i> Country: UK</p>
                        <p class="winner-info"><i class="fas fa-medal"></i> Badge: Platinum</p>
                    </div>
                    <div class="winner-status-badge">
                        <i class="fas fa-trophy"></i> WINNER
                        <span class="winner-year">2025</span>
                    </div>
                </div>

                <!-- Winner Card 8 -->
                <div class="winner-card">
                    <div class="winner-rank-badge">1</div>
                    <div class="winner-content">
                        <h3 class="winner-name">Vamsi Krishna Pulusu</h3>
                        <p class="winner-award"><i class="fas fa-trophy"></i> Award: Data Analytics Excellence Award
                        </p>
                        <p class="winner-category"><i class="fas fa-layer-group"></i> Category: DATA ANALYTICS & BIG
                            DATA</p>
                        <p class="winner-info"><i class="fas fa-calendar"></i> Season: 2025-S2</p>
                        <p class="winner-info"><i class="fas fa-globe"></i> Country: US</p>
                        <p class="winner-info"><i class="fas fa-medal"></i> Badge: Gold</p>
                    </div>
                    <div class="winner-status-badge">
                        <i class="fas fa-trophy"></i> WINNER
                        <span class="winner-year">2025</span>
                    </div>
                </div>

                <!-- Winner Card 9 -->
                <div class="winner-card">
                    <div class="winner-rank-badge">1</div>
                    <div class="winner-content">
                        <h3 class="winner-name">Meridian Flow</h3>
                        <p class="winner-award"><i class="fas fa-trophy"></i> Award: EdTech Impact Award</p>
                        <p class="winner-category"><i class="fas fa-layer-group"></i> Category: EDUCATION TECHNOLOGY
                            & EDTECH</p>
                        <p class="winner-info"><i class="fas fa-calendar"></i> Season: Season 1</p>
                        <p class="winner-info"><i class="fas fa-globe"></i> Country: Poland</p>
                        <p class="winner-info"><i class="fas fa-medal"></i> Badge: Gold</p>
                    </div>
                    <div class="winner-status-badge">
                        <i class="fas fa-trophy"></i> WINNER
                        <span class="winner-year">2025</span>
                    </div>
                </div>

                <!-- Winner Card 10 -->
                <div class="winner-card">
                    <div class="winner-rank-badge">1</div>
                    <div class="winner-content">
                        <h3 class="winner-name">Edwin Lim</h3>
                        <p class="winner-award"><i class="fas fa-trophy"></i> Award: AI Impact Award</p>
                        <p class="winner-category"><i class="fas fa-layer-group"></i> Category: ARTIFICIAL
                            INTELLIGENCE & MACHINE LEARNING</p>
                        <p class="winner-info"><i class="fas fa-calendar"></i> Season: Season 1</p>
                        <p class="winner-info"><i class="fas fa-globe"></i> Country: Singapore</p>
                        <p class="winner-info"><i class="fas fa-medal"></i> Badge: Platinum</p>
                    </div>
                    <div class="winner-status-badge">
                        <i class="fas fa-trophy"></i> WINNER
                        <span class="winner-year">2025</span>
                    </div>
                </div>

                <!-- Winner Card 11 -->
                <div class="winner-card">
                    <div class="winner-rank-badge">1</div>
                    <div class="winner-content">
                        <h3 class="winner-name">Eryvon Shield</h3>
                        <p class="winner-award"><i class="fas fa-trophy"></i> Award: Telecom Impact Award</p>
                        <p class="winner-category"><i class="fas fa-layer-group"></i> Category: TELECOMMUNICATIONS &
                            NETWORKS</p>
                        <p class="winner-info"><i class="fas fa-calendar"></i> Season: Season 2</p>
                        <p class="winner-info"><i class="fas fa-globe"></i> Country: Georgia</p>
                        <p class="winner-info"><i class="fas fa-medal"></i> Badge: Gold</p>
                    </div>
                    <div class="winner-status-badge">
                        <i class="fas fa-trophy"></i> WINNER
                        <span class="winner-year">2025</span>
                    </div>
                </div>

                <!-- Winner Card 12 -->
                <div class="winner-card">
                    <div class="winner-rank-badge">1</div>
                    <div class="winner-content">
                        <h3 class="winner-name">Ravi Teja Avireneni</h3>
                        <p class="winner-award"><i class="fas fa-trophy"></i> Award: Software Impact Award</p>
                        <p class="winner-category"><i class="fas fa-layer-group"></i> Category: SOFTWARE &
                            APPLICATIONS</p>
                        <p class="winner-info"><i class="fas fa-calendar"></i> Season: 2025-S2</p>
                        <p class="winner-info"><i class="fas fa-globe"></i> Country: US</p>
                        <p class="winner-info"><i class="fas fa-medal"></i> Badge: Gold</p>
                    </div>
                    <div class="winner-status-badge">
                        <i class="fas fa-trophy"></i> WINNER
                        <span class="winner-year">2025</span>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="archive-pagination">
                <button class="page-number active">1</button>
                <button class="page-number">2</button>
                <button class="page-number">3</button>
                <button class="page-number">4</button>
                <button class="page-number">5</button>
                <button class="page-number">6</button>
                <button class="page-number">7</button>
                <button class="page-number">8</button>
                <button class="page-number">9</button>
                <button class="page-number">10</button>
                <span class="page-dots">...</span>
                <button class="page-number">12</button>
                <button class="page-number">14</button>
                <button class="page-number">16</button>
            </div>
        </div>
    </section>

    <!-- Winners Gallery with Hover Section -->
    <section class="winners-gallery-hover">
        <div class="container">
            <div class="gallery-hero-header">
                <h2 class="gallery-main-title">
                    Hall of <span class="gallery-highlight">Excellence</span>
                </h2>
                <p class="gallery-subtitle">
                    Hover over the images to discover our exceptional winners
                </p>
            </div>

            <div class="winners-image-grid">
                <!-- Winner Image Card 1 -->
                <div class="winner-image-card">
                    <img src="divya-images/about.jpg" alt="Anders Holm" class="winner-img">
                    <div class="winner-hover-overlay">
                        <div class="overlay-content">
                            <h3 class="overlay-name">Anders Holm</h3>
                            <div class="overlay-divider"></div>
                            <p class="overlay-award">Sustainable Tech Impact Award</p>
                            <p class="overlay-category">TRANSPORTATION & MOBILITY</p>
                            <div class="overlay-details">
                                <span class="overlay-country"><i class="fas fa-map-marker-alt"></i> Finland</span>
                                <span class="overlay-badge"><i class="fas fa-medal"></i> Platinum</span>
                            </div>
                            <div class="overlay-year">2025</div>
                        </div>
                    </div>
                </div>

                <!-- Winner Image Card 2 -->
                <div class="winner-image-card">
                    <img src="divya-images/about.jpg" alt="Nagerjuna Gummadi" class="winner-img">
                    <div class="winner-hover-overlay">
                        <div class="overlay-content">
                            <h3 class="overlay-name">Nagerjuna Gummadi</h3>
                            <div class="overlay-divider"></div>
                            <p class="overlay-award">Data Analytics Excellence</p>
                            <p class="overlay-category">DATA ANALYTICS & BIG DATA</p>
                            <div class="overlay-details">
                                <span class="overlay-country"><i class="fas fa-map-marker-alt"></i> US</span>
                                <span class="overlay-badge"><i class="fas fa-medal"></i> Gold</span>
                            </div>
                            <div class="overlay-year">2025</div>
                        </div>
                    </div>
                </div>

                <!-- Winner Image Card 3 -->
                <div class="winner-image-card">
                    <img src="divya-images/about.jpg" alt="Viktoria Knee" class="winner-img">
                    <div class="winner-hover-overlay">
                        <div class="overlay-content">
                            <h3 class="overlay-name">Viktoria Knee</h3>
                            <div class="overlay-divider"></div>
                            <p class="overlay-award">Supply Chain Impact</p>
                            <p class="overlay-category">LOGISTICS & AUTOMATION</p>
                            <div class="overlay-details">
                                <span class="overlay-country"><i class="fas fa-map-marker-alt"></i> Germany</span>
                                <span class="overlay-badge"><i class="fas fa-medal"></i> Platinum</span>
                            </div>
                            <div class="overlay-year">2025</div>
                        </div>
                    </div>
                </div>

                <!-- Winner Image Card 4 -->
                <div class="winner-image-card">
                    <img src="divya-images/about.jpg" alt="Jenn Graham" class="winner-img">
                    <div class="winner-hover-overlay">
                        <div class="overlay-content">
                            <h3 class="overlay-name">Jenn Graham</h3>
                            <div class="overlay-divider"></div>
                            <p class="overlay-award">EdTech Innovation</p>
                            <p class="overlay-category">EDUCATION & FINTECH</p>
                            <div class="overlay-details">
                                <span class="overlay-country"><i class="fas fa-map-marker-alt"></i> UK</span>
                                <span class="overlay-badge"><i class="fas fa-medal"></i> Gold</span>
                            </div>
                            <div class="overlay-year">2025</div>
                        </div>
                    </div>
                </div>

                <!-- Winner Image Card 5 -->
                <div class="winner-image-card">
                    <img src="divya-images/about.jpg" alt="Eleanor Whitmore" class="winner-img">
                    <div class="winner-hover-overlay">
                        <div class="overlay-content">
                            <h3 class="overlay-name">Eleanor Whitmore</h3>
                            <div class="overlay-divider"></div>
                            <p class="overlay-award">IoT Impact Award</p>
                            <p class="overlay-category">INTERNET OF THINGS</p>
                            <div class="overlay-details">
                                <span class="overlay-country"><i class="fas fa-map-marker-alt"></i> Sweden</span>
                                <span class="overlay-badge"><i class="fas fa-medal"></i> Diamond</span>
                            </div>
                            <div class="overlay-year">2025</div>
                        </div>
                    </div>
                </div>

                <!-- Winner Image Card 6 -->
                <div class="winner-image-card">
                    <img src="divya-images/about.jpg" alt="Edwin Lim" class="winner-img">
                    <div class="winner-hover-overlay">
                        <div class="overlay-content">
                            <h3 class="overlay-name">Edwin Lim</h3>
                            <div class="overlay-divider"></div>
                            <p class="overlay-award">AI Impact Award</p>
                            <p class="overlay-category">ARTIFICIAL INTELLIGENCE</p>
                            <div class="overlay-details">
                                <span class="overlay-country"><i class="fas fa-map-marker-alt"></i> Singapore</span>
                                <span class="overlay-badge"><i class="fas fa-medal"></i> Platinum</span>
                            </div>
                            <div class="overlay-year">2025</div>
                        </div>
                    </div>
                </div>

                <!-- Winner Image Card 7 -->
                <div class="winner-image-card">
                    <img src="divya-images/about.jpg" alt="Bhaskardeep Khaund" class="winner-img">
                    <div class="winner-hover-overlay">
                        <div class="overlay-content">
                            <h3 class="overlay-name">Bhaskardeep Khaund</h3>
                            <div class="overlay-divider"></div>
                            <p class="overlay-award">Cybersecurity Excellence</p>
                            <p class="overlay-category">CYBERSECURITY</p>
                            <div class="overlay-details">
                                <span class="overlay-country"><i class="fas fa-map-marker-alt"></i> UK</span>
                                <span class="overlay-badge"><i class="fas fa-medal"></i> Platinum</span>
                            </div>
                            <div class="overlay-year">2025</div>
                        </div>
                    </div>
                </div>

                <!-- Winner Image Card 8 -->
                <div class="winner-image-card">
                    <img src="divya-images/about.jpg" alt="Vamsi Krishna" class="winner-img">
                    <div class="winner-hover-overlay">
                        <div class="overlay-content">
                            <h3 class="overlay-name">Vamsi Krishna Pulusu</h3>
                            <div class="overlay-divider"></div>
                            <p class="overlay-award">Data Analytics Excellence</p>
                            <p class="overlay-category">DATA ANALYTICS</p>
                            <div class="overlay-details">
                                <span class="overlay-country"><i class="fas fa-map-marker-alt"></i> US</span>
                                <span class="overlay-badge"><i class="fas fa-medal"></i> Gold</span>
                            </div>
                            <div class="overlay-year">2025</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
