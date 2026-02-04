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
                @foreach ($judges as $judge)
                    <!-- Judge Card -->
                    @if ($judge->has_details_page)
                        <a href="{{ route('judge-details', ['name' => $judge->name]) }}" class="judge-card-link">
                    @endif
                    <div class="judge-card">
                        <div class="judge-image-wrapper">
                            <img src="{{ $judge->image ? asset('storage/' . $judge->image) : asset('divya-images/about.jpg') }}"
                                alt="{{ $judge->name }}" class="judge-photo">
                            <div class="judge-overlay"></div>
                        </div>
                        <div class="judge-info">
                            <h3 class="judge-name">{{ $judge->name }}</h3>
                            <p class="judge-title">{{ $judge->designation }}</p>
                            <p class="content-judge-specialty">Specialization: {{ $judge->specialization }}</p>
                        </div>
                    </div>
                    @if ($judge->has_details_page)
                        </a>
                    @endif
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="judges-pagination-wrapper">
                {{ $judges->links('vendor.pagination.custom') }}
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
                @foreach ($panelMembers as $member)
                    <!-- Content Card -->
                    <div class="judge-content-card">
                        <h3 class="content-judge-name">
                            @if ($member->has_details_page)
                                <a href="{{ route('panel-details', ['name' => $member->name]) }}"
                                    style="color: inherit; text-decoration: none;">{{ $member->name }}</a>
                            @else
                                {{ $member->name }}
                            @endif
                        </h3>
                        <p class="content-judge-title">{{ $member->display_designation }}</p>
                        <p class="content-judge-specialty">Specialization: {{ $member->specialization }}</p>
                        @if ($member->bio_html)
                            <p class="content-judge-bio">
                                {!! Str::limit(strip_tags($member->bio_html), 150) !!}
                            </p>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="judges-pagination-wrapper">
                {{ $panelMembers->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>

    <style>
        /* Custom Pagination Styles */
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
    </style>
@endsection
