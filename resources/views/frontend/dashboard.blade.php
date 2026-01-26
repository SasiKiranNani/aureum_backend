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
                                <h1 class="fs-96 text-uppercase fs-sm-10vw mb-0 lh-1">Dashboard</h1>
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
                <div class="col-lg-4">
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
                            <ul class="sidebar-menu dashboard-tabs">
                                <li class="active" data-tab="overview">
                                    <a href="javascript:void(0)"><i class="fa fa-th-large"></i> Overview</a>
                                </li>
                                <li data-tab="edit-profile">
                                    <a href="javascript:void(0)"><i class="fa fa-edit"></i> Edit Profile</a>
                                </li>
                                <li data-tab="change-password">
                                    <a href="javascript:void(0)"><i class="fa fa-lock"></i> Change Password</a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-trophy"></i> My Nominations</a>
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
                        <!-- Overview Tab -->
                        <div id="tab-overview" class="dashboard-tab-content active">
                            <div class="row g-4">
                                <!-- Welcome Card -->
                                <div class="col-12">
                                    <div class="dashboard-card welcome-card">
                                        <div class="card-content">
                                            <h2>Welcome back, <span
                                                    class="user-first-name">{{ explode(' ', Auth::user()->name)[0] }}</span>!
                                            </h2>
                                            <p>Manage your nominations, track awards, and update your profile from your
                                                personal dashboard.</p>
                                        </div>
                                        <div class="card-decor">
                                            <i class="fa fa-sparkles"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- Stats -->
                                <div class="col-md-6">
                                    <div class="dashboard-card stat-card">
                                        <div class="stat-icon"><i class="fa fa-trophy"></i></div>
                                        <div class="stat-info">
                                            <span class="label">My Nominations</span>
                                            <span class="value">0</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Profile Info -->
                                <div class="col-12">
                                    <div class="dashboard-card">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <h4 class="mb-0">Profile Information</h4>
                                        </div>
                                        <div class="card-body p-0 mt-4">
                                            <div class="info-list">
                                                <div class="info-item">
                                                    <span class="label">Full Name</span>
                                                    <span class="value user-name-display">{{ Auth::user()->name }}</span>
                                                </div>
                                                <div class="info-item">
                                                    <span class="label">Email Address</span>
                                                    <span class="value">{{ Auth::user()->email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Profile Tab -->
                        <div id="tab-edit-profile" class="dashboard-tab-content">
                            <div class="dashboard-card">
                                <h4>Edit Profile</h4>
                                <form id="updateProfileForm" action="{{ route('profile.update') }}" method="POST"
                                    class="mt-4">
                                    @csrf
                                    <div class="field-set mb-4">
                                        <label class="static-label">Full Name</label>
                                        <input type="text" name="name" class="form-control premium-input"
                                            value="{{ Auth::user()->name }}" required>
                                    </div>
                                    <button type="submit" class="btn-main">
                                        <span class="btn-text">Update Profile</span>
                                        <span class="btn-spinner d-none"><i class="fa fa-spinner fa-spin"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Change Password Tab -->
                        <div id="tab-change-password" class="dashboard-tab-content">
                            <div class="dashboard-card">
                                <h4>Change Password</h4>
                                <form id="updatePasswordForm" action="{{ route('password.update') }}" method="POST"
                                    class="mt-4">
                                    @csrf
                                    <div class="field-set mb-4">
                                        <label class="static-label">Old Password</label>
                                        <input type="password" name="old_password" class="form-control premium-input"
                                            required>
                                    </div>
                                    <div class="field-set mb-4">
                                        <label class="static-label">New Password</label>
                                        <input type="password" name="new_password" class="form-control premium-input"
                                            required>
                                    </div>
                                    <div class="field-set mb-4">
                                        <label class="static-label">Confirm New Password</label>
                                        <input type="password" name="new_password_confirmation"
                                            class="form-control premium-input" required>
                                    </div>
                                    <button type="submit" class="btn-main">
                                        <span class="btn-text">Change Password</span>
                                        <span class="btn-spinner d-none"><i class="fa fa-spinner fa-spin"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tab Switching Logic
            const tabs = document.querySelectorAll('.dashboard-tabs li[data-tab]');
            const contents = document.querySelectorAll('.dashboard-tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = this.getAttribute('data-tab');
                    if (!target) return;

                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));
                    // Add active class to current tab
                    this.classList.add('active');

                    // Handle content visibility
                    contents.forEach(c => {
                        if (c.id === 'tab-' + target) {
                            c.classList.add('active');
                        } else {
                            c.classList.remove('active');
                        }
                    });
                });
            });

            // AJAX Form Submission Logic
            const handleFormSubmit = (formId) => {
                const form = document.getElementById(formId);
                if (!form) return;

                form.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    const submitBtn = form.querySelector('button[type="submit"]');
                    const btnText = submitBtn.querySelector('.btn-text');
                    const btnSpinner = submitBtn.querySelector('.btn-spinner');

                    btnText.classList.add('d-none');
                    btnSpinner.classList.remove('d-none');
                    submitBtn.disabled = true;

                    const formData = new FormData(form);

                    try {
                        const response = await fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]')?.content || ''
                            }
                        });

                        const data = await response.json();

                        if (response.ok) {
                            Toast.fire({
                                icon: 'success',
                                text: data.message
                            });

                            if (formId === 'updateProfileForm') {
                                // Update name displays across the page
                                document.querySelectorAll('.user-name-display').forEach(el =>
                                    el.innerText = data.user.name);
                                document.querySelectorAll('.user-first-name').forEach(el =>
                                    el.innerText = data.user.name.split(' ')[0]);
                            }

                            if (formId === 'updatePasswordForm') {
                                form.reset();
                            }
                        } else {
                            let errorMsg = data.message || 'Something went wrong.';
                            if (data.errors) {
                                errorMsg = Object.values(data.errors).flat()[0];
                            }
                            Toast.fire({
                                icon: 'error',
                                text: errorMsg
                            });
                        }
                    } catch (error) {
                        console.error('Form Error:', error);
                        Toast.fire({
                            icon: 'error',
                            text: 'Network error. Please try again.'
                        });
                    } finally {
                        btnText.classList.remove('d-none');
                        btnSpinner.classList.add('d-none');
                        submitBtn.disabled = false;
                    }
                });
            };

            handleFormSubmit('updateProfileForm');
            handleFormSubmit('updatePasswordForm');
        });
    </script>

    <style>
        .dashboard-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 215, 0, 0.1);
            border-radius: 20px;
            padding: 30px;
            height: 100%;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
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

        /* Dashboard Tab Visibility */
        .dashboard-tab-content {
            display: none;
            animation: dashboardFadeIn 0.3s ease;
        }

        .dashboard-tab-content.active {
            display: block !important;
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
