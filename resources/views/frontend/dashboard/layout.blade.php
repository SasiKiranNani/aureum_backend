@extends('layouts.frontend.index')

@section('contents')
    <section id="section-hero" class="section-dark no-top no-bottom text-light jarallax relative mh-500 jarallax">
        <img src="{{ asset('frontend/images/background/4.webp') }}" class="jarallax-img" alt="">
        <div class="gradient-edge-bottom h-50"></div>
        <div class="sw-overlay op-5"></div>
        <div class="abs w-80 bottom-10 z-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-between gx-5">
                    <div class="col-lg-6">
                        <div class="relative wow mask-right">
                            <div class="text-start">
                                <h1 class="fs-96 text-uppercase fs-sm-10vw mb-0 lh-1">ORIONSM</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-dark relative">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-lg-4 sticky-top" style="height: fit-content; top: 100px; z-index: 10;">
                    <div class="dashboard-card profile-sidebar">
                        <div class="profile-header text-center">
                            <div class="profile-avatar mb-4">
                                <i class="fa fa-user-circle"></i>
                            </div>
                            <h3 class="mb-1 user-name-display">{{ Auth::user()->name }}</h3>
                            <p class="text-muted">{{ Auth::user()->email }}</p>
                            <div class="profile-badge mt-2">Member Since {{ Auth::user()->created_at->format('M Y') }}</div>
                        </div>

                        <div class="sidebar-menu-wrap mt-5">
                            <ul class="sidebar-menu">
                                <li class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                                    <a href="{{ route('dashboard') }}"><i class="fa fa-th-large"></i> Overview</a>
                                </li>
                                <li class="{{ request()->routeIs('dashboard.profile') ? 'active' : '' }}">
                                    <a href="{{ route('dashboard.profile') }}"><i class="fa fa-edit"></i> Edit Profile</a>
                                </li>
                                <li class="{{ request()->routeIs('dashboard.password') ? 'active' : '' }}">
                                    <a href="{{ route('dashboard.password') }}"><i class="fa fa-lock"></i> Change
                                        Password</a>
                                </li>
                                <li class="{{ request()->routeIs('dashboard.nominations*') ? 'active' : '' }}">
                                    <a href="{{ route('dashboard.nominations') }}"><i class="fa fa-trophy"></i> My
                                        Nominations</a>
                                </li>
                                <li class="{{ request()->routeIs('dashboard.bookings*') ? 'active' : '' }}">
                                    <a href="{{ route('dashboard.bookings') }}"><i class="fa fa-ticket"></i> My
                                        Tickets</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="text-danger">
                                        <i class="fa fa-sign-out"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-lg-8">
                    <div class="tab-content-wrapper">
                        @yield('dashboard-content')
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        html,
        body {
            overflow: visible !important;
        }

        .dashboard-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 215, 0, 0.1);
            border-radius: 20px;
            padding: 30px;
            height: 100%;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .profile-sidebar {
            position: sticky;
            top: 100px;
        }

        .dashboard-card:hover {
            border-color: rgba(255, 215, 0, 0.3);
            background: rgba(255, 255, 255, 0.05);
        }

        .profile-avatar i {
            font-size: 80px;
            color: #FFD700;
            text-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
        }

        .profile-badge {
            display: inline-block;
            padding: 5px 15px;
            background: rgba(255, 215, 0, 0.1);
            color: #FFD700;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
        }

        .sidebar-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-menu li {
            margin-bottom: 5px;
        }

        .sidebar-menu li a {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 12px 20px;
            border-radius: 12px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .sidebar-menu li.active a,
        .sidebar-menu li a:hover {
            background: rgba(255, 215, 0, 0.08);
            color: #FFD700;
        }

        .welcome-card {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.15), rgba(17, 17, 17, 0.5));
            border-left: 5px solid #FFD700;
            position: relative;
            overflow: hidden;
        }

        .welcome-card h2 {
            color: #FFD700;
            margin-bottom: 10px;
        }

        .stat-card {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 215, 0, 0.1);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #FFD700;
            font-size: 24px;
        }

        .stat-info .label {
            display: block;
            font-size: 14px;
            color: rgba(255, 255, 255, 0.5);
        }

        .stat-info .value {
            font-size: 24px;
            font-weight: 700;
            color: #fff;
        }

        .info-list .info-item {
            display: grid;
            grid-template-columns: 200px 1fr;
            padding: 15px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .info-list .info-item:last-child {
            border-bottom: none;
        }

        .info-list .info-item .label {
            color: rgba(255, 255, 255, 0.5);
        }

        .info-list .info-item .value {
            color: #fff;
            font-weight: 600;
        }

        @media (max-width: 991px) {
            .profile-sidebar {
                margin-bottom: 30px;
            }
        }

        .dashboard-content {
            animation: dashboardFadeIn 0.3s ease;
        }

        @keyframes dashboardFadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
@endsection
