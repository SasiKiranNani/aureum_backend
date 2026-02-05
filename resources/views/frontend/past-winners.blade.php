@extends('layouts.frontend.index')

@section('contents')
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

            <!-- Filters Section -->
            <div class="winners-filter-section mb-5">
                <form action="{{ route('past-winners') }}" method="GET" class="winners-filter-form" id="filterForm">
                    <div class="filter-row">
                        <!-- Search -->
                        <div class="filter-group search-group">
                            <i class="fas fa-search search-icon"></i>
                            <input type="text" name="search" class="filter-input" placeholder="Search winners..."
                                value="{{ request('search') }}" onkeypress="if(event.key === 'Enter') this.form.submit()">
                        </div>

                        <!-- Year Filter -->
                        <div class="filter-group">
                            <select name="year" class="filter-select" onchange="this.form.submit()">
                                <option value="">All Years</option>
                                @foreach ($years as $yearOption)
                                    <option value="{{ $yearOption }}"
                                        {{ request('year') == $yearOption ? 'selected' : '' }}>{{ $yearOption }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Season Filter -->
                        <div class="filter-group">
                            <select name="season_id" class="filter-select" onchange="this.form.submit()">
                                <option value="">All Seasons</option>
                                @foreach ($seasons as $season)
                                    <option value="{{ $season->id }}"
                                        {{ request('season_id') == $season->id ? 'selected' : '' }}>{{ $season->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Badge Filter -->
                        <div class="filter-group">
                            <select name="badge_id" class="filter-select" onchange="this.form.submit()">
                                <option value="">All Badges</option>
                                @foreach ($badges as $badge)
                                    <option value="{{ $badge->id }}"
                                        {{ request('badge_id') == $badge->id ? 'selected' : '' }}>{{ $badge->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Category Filter -->
                        <div class="filter-group">
                            <select name="category_id" class="filter-select" onchange="this.form.submit()">
                                <option value="">All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </form>
            </div>

            <div class="winners-image-grid">
                @forelse($winners as $winner)
                    <!-- Winner Image Card -->
                    <div class="winner-image-card">
                        <img src="{{ $winner->image ? asset('storage/' . $winner->image) : asset('divya-images/about.jpg') }}"
                            alt="{{ $winner->name }}" class="winner-img">
                        <div class="winner-hover-overlay">
                            <div class="overlay-content">
                                <h3 class="overlay-name">{{ $winner->name }}</h3>
                                <div class="overlay-divider"></div>
                                <p class="overlay-award">{{ $winner->award_name }}</p>
                                <p class="overlay-category">{{ strtoupper($winner->category_name) }}</p>
                                <div class="overlay-details">
                                    <span class="overlay-country"><i class="fas fa-map-marker-alt"></i>
                                        {{ $winner->country }}</span>
                                    @if ($winner->badge_name)
                                        <span class="overlay-badge"><i class="fas fa-medal"></i>
                                            {{ $winner->badge_name }}</span>
                                    @endif
                                </div>
                                <div class="overlay-year">{{ $winner->year }}</div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="no-winners-found"
                        style="grid-column: 1 / -1; text-align: center; color: #fff; padding: 50px;">
                        <h3>No winners found matching your criteria.</h3>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="judges-pagination-wrapper">
                {{ $winners->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>

    <style>
        /* Filter Styles */
        .winners-filter-section {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 40px;
        }

        .filter-row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            align-items: center;
            justify-content: center;
        }

        .filter-group {
            position: relative;
            min-width: 150px;
            flex: 1;
        }

        .search-group {
            flex: 2;
            min-width: 200px;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #aaa;
        }

        .filter-input,
        .filter-select {
            width: 100%;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            padding: 10px 15px;
            color: #fff;
            font-size: 14px;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-group .filter-input {
            padding-left: 35px;
        }

        .filter-select {
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='white' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 10px center;
            background-size: 1em;
            padding-right: 30px;
        }

        .filter-select option {
            background: #222;
            color: #fff;
        }

        /* Pagination Styles (Copied from judges.blade.php for consistency) */
        .judges-pagination-wrapper {
            margin-top: 50px;
            display: flex;
            justify-content: center;
        }

        .custom-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Desktop Pagination - Show only page numbers */
        .desktop-pagination {
            display: flex;
            gap: 12px;
            align-items: center;
        }

        .mobile-pagination {
            display: none;
        }

        /* Page Numbers */
        .page-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 44px;
            height: 44px;
            padding: 0 16px;
            background: transparent;
            border: 2px solid #ff6b00;
            border-radius: 10px;
            color: #ff6b00;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s ease;
        }

        .page-number:hover {
            background: rgba(255, 107, 0, 0.15);
            color: #ff8c00;
        }

        .page-number.active {
            background: #ff6b00;
            color: #fff;
        }

        .page-dots {
            color: rgba(255, 255, 255, 0.4);
            padding: 0 8px;
        }

        /* Mobile Pagination - Show Prev/Next and current page */
        @media (max-width: 768px) {
            .desktop-pagination {
                display: none;
            }

            .mobile-pagination {
                display: flex;
                gap: 12px;
                align-items: center;
            }

            .page-btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0 24px;
                height: 44px;
                background: transparent;
                border: 2px solid #ff6b00;
                border-radius: 10px;
                color: #ff6b00;
                font-size: 15px;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.25s ease;
            }

            .page-btn:hover:not(.disabled) {
                background: rgba(255, 107, 0, 0.15);
            }

            .page-btn.disabled {
                opacity: 0.3;
                cursor: not-allowed;
            }
        }

        /* Responsive adjustments for filters */
        @media (max-width: 992px) {
            .filter-group {
                min-width: 45%;
            }
        }

        @media (max-width: 576px) {
            .filter-group {
                min-width: 100%;
            }
        }
    </style>
@endsection
